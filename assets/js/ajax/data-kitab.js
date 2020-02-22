
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblKitab').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	 			url: 'kitab/tampil_data/',
	    		dataSrc: 'data'
			},
	   			//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_kitab' },
	   			{ data : 'nama_kitab' },
	   			{ data : 'pengarang' },
	   			{ data : 'penerbit' },
	    		{ data : 'tahun'},
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
	    				html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_kitab +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_kitab +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblKitab tbody').on('click', '.btnHapus', function() {
			var id=$(this).attr('data');
			$('#modalHapus').modal('show');
			$('.hide').hide();
			$('[name="deleteValue"]').val(id);
		});

		//AJAX Hapus Data by Id
		$('#btnModalHapus').on('click', function() {
			var id = $('[name="deleteValue"]').val();
			$.ajax({
				type : 'POST',
				url : 'kitab/hapus_data/',
				dataType : 'json',
				data : {deleteValue:id},
				success : function() {
					$('#modalHapus').modal('hide');
					table.ajax.reload();
				}
			});
			return false;
		});

	/* Update Area */
		//AJAX Tampil Data By ID
		$('#tblKitab tbody').on('click', '.btnShow', function() {
			//Inisialisasi Data
			var id=$(this).attr('data');
			//Menampilkan Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Lihat Data Kitab");
			$('#btnModal').val("Edit Data");
			$('#btnModal').removeClass("tambahData");
			$('#btnModal').addClass("editData");
			$.ajax({
				type : 'POST',
				url : 'kitab/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_kitab);
					$('#nama').val(data.nama_kitab);
					$('#pengarang').val(data.pengarang);
					$('#penerbit').val(data.penerbit);
					$('#tahun').val(data.tahun);				
				}
			});
		});
		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_kitab = $('#modalEditData #id').val();
			var nama_kitab = $('#modalEditData #nama').val();
			var pengarang = $('#modalEditData #pengarang').val();
			var penerbit = $('#modalEditData #penerbit').val();
			var tahun = $('#modalEditData #tahun').val();
			$.ajax({
				type : 'POST',
				url : 'kitab/update_data/',
				dataType : 'json',
				data : {id_kitab:id_kitab, nama_kitab:nama_kitab, pengarang:pengarang, penerbit:penerbit, tahun:tahun},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});

	/* Tambah Area */
		//Menampilkan Modal Tambah Data
		$('#btnAdd').on('click', function() {
			//Tampil Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Tambah Data Kitab");
			$('#btnModal').val("Simpan Data");
			$('#btnModal').removeClass("editData");
			$('#btnModal').addClass("tambahData");
			$('.id-row').hide();
			//Mengisi Form Modal
			$('#nama').val("");
			$('#pengarang').val("");
			$('#penerbit').val("");
			$('#tahun').val("");
		});
		//AJAX Tambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var id_kitab = $('#modalEditData #id').val();
			var nama_kitab = $('#modalEditData #nama').val();
			var pengarang = $('#modalEditData #pengarang').val();
			var penerbit = $('#modalEditData #penerbit').val();
			var tahun = $('#modalEditData #tahun').val();
			$.ajax({
				type : 'POST',
				url : 'kitab/tambah_data/',
				dataType : 'json',
				data : {id_kitab:id_kitab, nama_kitab:nama_kitab, pengarang:pengarang, penerbit:penerbit, tahun:tahun},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})