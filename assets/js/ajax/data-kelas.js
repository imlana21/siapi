
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblKelas').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	 			url: 'kelas/tampil_data/',
	    		dataSrc: 'data'
			},
	   			//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_kelas' },
	   			{ data : 'nama_kelas' },
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
	    				html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_kelas +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_kelas +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblKelas tbody').on('click', '.btnHapus', function() {
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
				url : 'kelas/hapus_data/',
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
		$('#tblKelas tbody').on('click', '.btnShow', function() {
			var id=$(this).attr('data');
			$('#modalEditData').modal('show');
			$('#modalEditTitle').html("Lihat Data kelas");
			$('#btnModal').val("Edit Data");
			$('#btnModal').removeClass("tambahData");
			$('#btnModal').addClass("editData");
			$.ajax({
				type : 'POST',
				url : 'kelas/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_kelas);
					$('#nama').val(data.nama_kelas);				
				}
			});
		});
		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_kelas = $('#modalEditData #id').val();
			var nama_kelas = $('#modalEditData #nama').val();
			$.ajax({
				type : 'POST',
				url : 'kelas/update_data/',
				dataType : 'json',
				data : {id_kelas:id_kelas, nama_kelas:nama_kelas},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});

	/* Tambah Area */
		//Menampilkan Modal Tambah Data
		$('#btnAdd').on('click', function() {
			//Tampilkan Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('.id-row').hide();
			$('#modalEditTitle').html("Tambah Data kelas");
			$('#btnModal').val("Simpan Data");
			$('#btnModal').removeClass("editData");
			$('#btnModal').addClass("tambahData");
			//Mengisi Form
			$('#id').val("");
			$('#nama').val("");		
		});
		//AJAX Tambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var id_kelas = $('#modalEditData #id').val();
			var nama_kelas = $('#modalEditData #nama').val();
			$.ajax({
				type : 'POST',
				url : 'kelas/tambah_data/',
				dataType : 'json',
				data : {id_kelas:id_kelas, nama_kelas:nama_kelas},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})