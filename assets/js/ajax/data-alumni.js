
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblAlumni').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	 			url: 'alumni/tampil_data',
	    		dataSrc: 'data'
			},
	   			//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_alumni' },
	   			{ data : 'nama_alumni' },
	   			{ render : function(data, type, row) {
						if (row.gender == "L") {
							return "Laki-Laki";
						}
						if (row.gender == "P") {
							return "Perempuan";
						}
					} 
				},
	   			{ data : 'phone' },
	   			{ data : 'tgl_masuk' },
	   			{ data : 'tgl_keluar' },
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
	    				html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_alumni +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_alumni +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
	    	//Mengatur Colomn
			columnDefs: [{
					targets : 6,
					orderable : false,
					searchable : false
			},{
					targets : 3,
					orderable : false
			}],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblAlumni tbody').on('click', '.btnHapus', function() {
			var id=$(this).attr('data');
			$('#modalHapus').modal('show');
			$('.hide').hide();
			$('[name="deleteValue"]').val(id);
		});

		//AJAX Hapus Data by Id
		$('#btnModalHapus').on('click', function() {
			var deleteValue = $('[name="deleteValue"]').val();
			$.ajax({
				type : 'POST',
				url : 'alumni/hapus_data/',
				dataType : 'json',
				data : {deleteValue:deleteValue},
				success : function() {
					$('#modalHapus').modal('hide');
					table.ajax.reload();
				}
			});
			return false;
		});

	/* Update Area */
		//AJAX Tampil Data By ID
		$('#tblAlumni tbody').on('click', '.btnShow', function() {
			//Inisisalisasi data
			var id=$(this).attr('data');
			//Meanampilkan Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Lihat Data alumni");
			$('.id-row').show();
			$('#btnModalEdit').val("Edit Data");
			$('#btnModalEdit').removeClass("tambahData");
			$('#btnModalEdit').addClass("editData");
			$('#tgl_masuk').prop('disabled', true);
			$('#tgl_keluar').prop('disabled', true);
			$.ajax({
				type : 'POST',
				url : 'alumni/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_alumni);
					$('#nama').val(data.nama_alumni);				
					$('#gender').val(data.gender);				
					$('#phone').val(data.phone);				
					$('#alamat').val(data.alamat);		
					$('#tgl_masuk').val(data.tgl_masuk);
					$('#tgl_keluar').val(data.tgl_keluar);
				}
			});
		});
		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_alumni = $('#modalEditData #id').val();
			var nama_alumni = $('#modalEditData #nama').val();		
			var gender = $('#gender').val();				
			var phone = $('#phone').val();				
			var alamat = $('#alamat').val();	
			$.ajax({
				type : 'POST',
				url : 'alumni/update_data/',
				dataType : 'json',
				data : {id_alumni:id_alumni, nama_alumni:nama_alumni, tgl_keluar:tgl_keluar, gender:gender, phone:phone, alamat:alamat},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});

	/* Tambah Area */
		//Menampilkan Modal Tambah Data
		$('#btnAdd').on('click', function() {
			//Show Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Tambah Data alumni");
			$('#btnModalEdit').val("Simpan Data");
			$('.hide').hide();
			$('.id-row').hide();
			$('#btnModalEdit').removeClass("editData");
			$('#btnModalEdit').addClass("tambahData");
			$('#tgl_masuk').prop('disabled', false);
			$('#tgl_keluar').prop('disabled', false);
			//Reset Form
			$('#id').val("");
			$('#nama').val("");					
			$('#gender').val("");				
			$('#phone').val("");				
			$('#alamat').val("");
			$('#tgl_masuk').val("");
			$('#tgl_keluar').val("");
		});
		//AJAX Tambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var nama_alumni = $('#modalEditData #nama').val();
			var gender = $('#modalEditData #gender').val();
			var phone = $('#modalEditData #phone').val();
			var alamat = $('#modalEditData #alamat').val();
			var tgl_masuk = $('#modalEditData #tgl_masuk').val();
			var tgl_keluar = $('#modalEditData #tgl_keluar').val();
			$.ajax({
				type : 'POST',
				url : 'alumni/tambah_data/',
				dataType : 'json',
				data : {nama_alumni:nama_alumni, gender:gender, phone:phone, alamat:alamat, tgl_masuk:tgl_masuk, tgl_keluar:tgl_keluar},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})