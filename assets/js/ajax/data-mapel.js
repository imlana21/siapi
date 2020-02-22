
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblMapel').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	 			url: 'mapel/tampil_data/',
	    		dataSrc: 'data'
			},
	   			//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'id_mapel' },
	   			{ data : 'nama_mapel' },
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
	    				html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_mapel +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_mapel +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblMapel tbody').on('click', '.btnHapus', function() {
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
				url : 'mapel/hapus_data/',
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
		$('#tblMapel tbody').on('click', '.btnShow', function() {
			var id=$(this).attr('data');
			$('#modalEditData').modal('show');
			$('#modalEditTitle').html("Lihat Data mapel");
			$('#btnModal').val("Edit Data");
			$('#btnModal').removeClass("tambahData");
			$('#btnModal').addClass("editData");
			$.ajax({
				type : 'POST',
				url : 'mapel/tampil_id/',
				dataType : 'json',
				data : {id:id},
				success : function(data) {
					$('#id').val(data.id_mapel);
					$('#nama').val(data.nama_mapel);				
				}
			});
		});
		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_mapel = $('#modalEditData #id').val();
			var nama_mapel = $('#modalEditData #nama').val();
			$.ajax({
				type : 'POST',
				url : 'mapel/update_data/',
				dataType : 'json',
				data : {id_mapel:id_mapel, nama_mapel:nama_mapel},
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
			$('#modalEditTitle').html("Tambah Data Mapel");
			$('#btnModal').val("Simpan Data");
			$('#btnModal').removeClass("editData");
			$('#btnModal').addClass("tambahData");
			$('.id-row').hide();
			//Reset Form ke nilai kosong
			$('#id').val("");
			$('#nama').val("");		
		});
		//AJAX Tambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var id_mapel = $('#modalEditData #id').val();
			var nama_mapel = $('#modalEditData #nama').val();
			$.ajax({
				type : 'POST',
				url : 'mapel/tambah_data/',
				dataType : 'json',
				data : {id_mapel:id_mapel, nama_mapel:nama_mapel},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	})