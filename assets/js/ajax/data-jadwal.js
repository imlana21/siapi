
	$( window ).ready(function(){
		//AJAX Tampil Data
		table = $('#tblJadwal').DataTable({
			//Menyimpan posisi terakhir row yang digunakan
			stateSave: true,
			//Mengambil data dari server
	   		ajax : {
	 			url: 'jadwal/tampil_data',
	    		dataSrc: 'data'
			},
	   			//Memilih data yang akan ditampilkan
	   		columns: [ 
	   			{ data : 'hari' },
	   			{ data : 'nama_kelas' },
	   			{ data : 'nama_mapel' },
	   			{ data : 'nama_kitab' },
	   			{ data : 'nama_pengajar' },
	    		{ 
	    			data : undefined,
	    			//Button Edit dan Save
	    			render : function( data, type, row ) {
	    				//Menampilkan button
	    				html = '<button class="btn btn-info btn-sm btnShow" data="' +
	    								row.id_jadwal +'"> Lihat </button>'+ ' ' +
	    							'<button class="btn btn-danger btn-sm btnHapus" data="' +
	    								row.id_jadwal +'"> Hapus </button>';
	    				return html;
	    			}
	    		}
	    	],
	    	//Mengatur Colomn
			columnDefs: [{
					targets : 5,
					orderable : false,
					searchable : false
			}],
		});

	/* Delete Area */
		//Menampilkan Modal Hapus Data
		$('#tblJadwal tbody').on('click', '.btnHapus', function() {
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
				url : 'jadwal/hapus_data/',
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
		$('#tblJadwal tbody').on('click', '.btnShow', function() {
			//Inisialisasi Data
			var id=$(this).attr('data');
			//Tampil Modal
			$('#modalEditData').modal('show');
			//Konfigurasi Modal
			$('#modalEditTitle').html("Lihat Jadwal");
			$('#btnModal').val("Edit Data");
			$('#btnModal').removeClass("tambahData");
			$('#btnModal').addClass("editData");
			$.ajax({
				type : 'POST',
				url : 'jadwal/tampil_id/',
				dataType : 'json',
				data : {id_jadwal:id},
				success : function(data) {
					$('#id').val(data.id_jadwal);
					$('#hari').val(data.hari);
					$('#kelas').val(data.kelas);
					$('#mapel').val(data.mapel);
					$('#kitab').val(data.kitab);
					$('#pengajar').val(data.pengajar);
				}
			});
		});
		//AJAX Update
		$('#modalEditData').on('click', '.editData', function() {
			var id_jadwal = $('#modalEditData #id').val();
			var hari = $('#modalEditData #hari').val();
			var kelas = $('#modalEditData #kelas').val();
			var mapel = $('#modalEditData #mapel').val();
			var kitab = $('#modalEditData #kitab').val();
			var pengajar = $('#modalEditData #pengajar').val();
			$.ajax({
				type : 'POST',
				url : 'jadwal/update_data/',
				dataType : 'json',
				data : {id_jadwal:id_jadwal, hari:hari, kelas:kelas, mapel:mapel, kitab:kitab, pengajar:pengajar},
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
			$('#modalEditTitle').html("Tambah Data Santri");
			$('#btnModal').val("Simpan Data");
			$('.hide-btn').hide();
			$('.id-row').hide();
			$('#btnModal').removeClass("editData");
			$('#btnModal').addClass("tambahData");
			$('#modalEditData #id').val("");
			$('#modalEditData #hari').val("");
			$('#modalEditData #mapel').val("");
			$('#modalEditData #kelas').val("");
			$('#modalEditData #kitab').val("");
			$('#modalEditData #pengajar').val("");
		});
		//Menambah Data
		$('#modalEditData').on('click', '.tambahData', function() {
			var hari = $('#modalEditData #hari').val();
			var mapel = $('#modalEditData #mapel').val();
			var kelas = $('#modalEditData #kelas').val();
			var kitab = $('#modalEditData #kitab').val();
			var pengajar = $('#modalEditData #pengajar').val();
			$.ajax({
				type : 'POST',
				url : 'jadwal/tambah_data/',
				dataType : 'json',
				data : {hari:hari, mapel:mapel, kelas:kelas, kitab:kitab, pengajar:pengajar},
				success : function(data) {
					$('#modalEditData').modal('hide');
					table.ajax.reload();
				}
			});
		});
	});