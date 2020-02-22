	var d = new Date();
	var tt = d.getDate();
	var mm = d.getMonth()+1;
	var yy = d.getFullYear();

	$( window ).ready(function(){
		//AJAJ Tampil Data
		table = $('#tblSantri').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	    		url: 'santri/tampil_data/',
				dataSrc: 'data'
  			},
	   		//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_santri' },
				{ data : 'nama_santri' },
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
	    		{ data : 'nama_kelas'},
	    		{ render : function( data, type, row ) {
	    				//Menampilkan button
						html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_santri +'"> Lihat </button>' + ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_santri +'"> Hapus </button>' + ' ';

	    				return html;
	    			}
	    		}
	    	],
	    	//Mengatur Colomn
			columnDefs: [{
					targets : 5,
					orderable : false,
					searchable : false
				}, {
					targets : 3,
					orderable : false					
			}],
			deferRender : true,
			ordering : true

		});


	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblSantri tbody').on('click', '.btnHapus', function() {
			var id=$(this).attr('data');
			$('#modalHapus').modal('show');
			$('[name="deleteValue"]').val(id);
		});
		//Menghapus Data
		$('#btnModalHapus').on('click', function() {
			var deleteValue = $('[name="deleteValue"]').val();
			$.ajax({
				type : 'POST',
				url : 'santri/hapus_data/',
				dataType : 'json',
				data : {deleteValue:deleteValue},
				success : function() {
					$('#modalHapus').modal('hide');
					table.ajax.reload();
				}
			});
			return false;
		});


		//Fungsi Set Alumni
		$('#btnModalAlumni').on('click', function() {
			var deleteValue = $('[name="deleteValue"]').val();
			$.ajax({
				type : 'POST',
				url : 'santri/set_alumni/',
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
		//Tampil Data by ID
		$('#tblSantri tbody').on('click', '.btnShow', function() {
			//Inisialisasi Data
			var id=$(this).attr('data');
			//Menampilkan Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('.hide-btn').show();
			$('.id-row').show();
			$('#modalEditTitle').html("Lihat Data Santri");
			$('#btnModalSetUstadz').val('Set Ustadz');
			$('#btnModalEdit').val("Edit Data");
			$('#btnModalEdit').removeClass("tambahData");
			$('#btnModalEdit').addClass("editData");
			//Ajax Tampil Data by ID
			$.ajax({
				type : 'POST',
				url : 'santri/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_santri);
					$('#nama').val(data.nama_santri);
					$('#gender').val(data.gender);
					$('#phone').val(data.phone);
					$('#alamat').val(data.alamat);
					$('#kelas').val(data.kelas);	
					$('#tgl_masuk').val(data.tgl_masuk);				
				}
			});
		});
		//Update Data
		$('#modalEditData').on('click', '.editData', function() {
			var id_santri = $('#modalEditData #id').val();
			var nama_santri = $('#modalEditData #nama').val();
			var gender = $('#modalEditData #gender').val();
			var phone = $('#modalEditData #phone').val();
			var alamat = $('#modalEditData #alamat').val();
			var kelas = $('#modalEditData #kelas').val();
			$.ajax({
				type : 'POST',
				url : 'santri/update_data/',
				dataType : 'json',
				data : {id_santri:id_santri, nama_santri:nama_santri, gender:gender, phone:phone, alamat:alamat,kelas:kelas},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});

	/* Tambah Data Area */
		//Menampilkan Modal Tambah Data
		$('#btnAdd').on('click', function() {
			$('#modalEditData').modal('show');
			$('#modalEditTitle').html("Tambah Data Santri");
			$('#btnModalEdit').val("Simpan Data");
			$('.hide-btn').hide();
			$('.id-row').hide();
			$('#btnModalEdit').removeClass("editData");
			$('#btnModalEdit').addClass("tambahData");
			$('#modalEditData #id').val("");
			$('#modalEditData #nama').val("");
			$('#modalEditData #gender').val("");
			$('#modalEditData #phone').val("");
			$('#modalEditData #alamat').val("");
			$('#modalEditData #kelas').val("");
		});
		//Menambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var tgl_masuk = yy + '-' + mm + '-' + tt;
			var nama_santri = $('#modalEditData #nama').val();
			var gender = $('#modalEditData #gender').val();
			var phone = $('#modalEditData #phone').val();
			var alamat = $('#modalEditData #alamat').val();
			var kelas = $('#modalEditData #kelas').val();
			$.ajax({
				type : 'POST',
				url : 'santri/tambah_data/',
				dataType : 'json',
				data : {nama_santri:nama_santri, gender:gender, phone:phone, alamat:alamat,kelas:kelas, tgl_masuk:tgl_masuk},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})