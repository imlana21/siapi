
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblUstadz').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	    		url: 'ustadz/tampil_data/',
			dataSrc: 'data'
  			},
	   		//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_pengajar' },
				{ data : 'nama_pengajar' },
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
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
						html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_pengajar +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_pengajar +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
	    	//Mengatur Colomn
			columnDefs: [{
					targets : 4,
					orderable : false,
					searchable : false
			}],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblUstadz tbody').on('click', '.btnHapus', function() {
			//Inisialisasi Data
			var id=$(this).attr('data');
			//Menampilkan Modal
			$('#modalHapus').modal('show');
			//Konfigurasi Modal
			$('[name="deleteValue"]').val(id);
			//Hide Button Set Alumni
			$('.hide').hide();
		});

		//AJAX Hapus Data by Id
		$('#btnModalHapus').on('click', function() {
			var deleteValue = $('[name="deleteValue"]').val();
			$.ajax({
				type : 'POST',
				url : 'ustadz/hapus_data/',
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
		//AJAX Tampil Data by Id
		$('#tblUstadz tbody').on('click', '.btnShow', function() {
			//Inisialisasi Data
			var id=$(this).attr('data');
			//Menampilkan Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('.hide').hide();
			$('.hide-btn').hide();
			$('.id-row').show();
			$('#modalEditTitle').html("Lihat Data Ustadz");
			$('#btnModalEdit').val("Edit Data");
			$('#btnModalEdit').removeClass("tambahData");
			$('#btnModalEdit').addClass("editData");
			$.ajax({
				type : 'POST',
				url : 'ustadz/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_pengajar);
					$('#nama').val(data.nama_pengajar);
					$('#gender').val(data.gender);
					$('#phone').val(data.phone);
					$('#alamat').val(data.alamat);
					$('#kelas').val(data.kelas);					
				}
			});
		});

		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_pengajar = $('#modalEditData #id').val();
			var nama_pengajar = $('#modalEditData #nama').val();
			var gender = $('#modalEditData #gender').val();
			var phone = $('#modalEditData #phone').val();
			var alamat = $('#modalEditData #alamat').val();
			$.ajax({
				type : 'POST',
				url : 'ustadz/update_data/',
				dataType : 'json',
				data : {id_pengajar:id_pengajar, nama_pengajar:nama_pengajar, gender:gender, phone:phone, alamat:alamat},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});

	/* Tambah Data Area */
		//Menampilkan Modal Tambah Data
		$('#btnAdd').on('click', function() {
			//Tampil Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Tambah Data Ustadz");
			$('#btnModalEdit').val("Simpan Data");
			$('.hide').hide();
			$('.hide-btn').hide();
			$('.id-row').hide();
			$('#btnModalEdit').removeClass("editData");
			$('#btnModalEdit').addClass("tambahData");
			//Reseet Form
			$('#modalEditData #id').val("");
			$('#modalEditData #nama').val("");
			$('#modalEditData #gender').val("");
			$('#modalEditData #phone').val("");
			$('#modalEditData #alamat').val("");
		});
		//AJAX Tambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var nama_pengajar = $('#modalEditData #nama').val();
			var gender = $('#modalEditData #gender').val();
			var phone = $('#modalEditData #phone').val();
			var alamat = $('#modalEditData #alamat').val();
			$.ajax({
				type : 'POST',
				url : 'ustadz/tambah_data/',
				dataType : 'json',
				data : {nama_pengajar:nama_pengajar, gender:gender, phone:phone, alamat:alamat},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})