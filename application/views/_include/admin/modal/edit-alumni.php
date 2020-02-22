	<!-- Modal Lihat Data -->
	<div class="modal fade" id="modalEditData" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="modalEditTitle">  </h5> 
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         		<span aria-hidden="true">&times;</span>
		      	  	</button>
		      	</div>
	      		<div class="modal-body">
	      			<form onsubmit="return inputRequired();" enctype="multipart/form-data">
					  	<div class="form-group id-row">
	        				<label for="id"> ID Alumni </label>
	        				<input type="text" class="form-control" name="id" id="id" value="" required="" disabled="">
					  	</div>
					  	<div class="form-group">
	        				<label for="nama"> Nama Alumni </label>
	        				<input type="text" class="form-control" name="nama" id="nama" value="" placeholder="Klik Disini">
					  	</div>
					  	<div class="form-group">
	        				<label for="gender"> Jenis Kelamin </label>
	        				<select name="gender" id="gender" class="form-control">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<option value="L"> Laki-Laki </option>
	        					<option value="P"> Perempuan </option>
	        				</select>
					  	</div>
					  	<div class="form-group">
	        				<label for="phone"> No HP </label>
	        				<input type="number" class="form-control" name="phone" id="phone" value="" placeholder="Klik Disini">
					  	</div>
					  	<div class="form-group">
	        				<label for="alamat"> Alamat </label>
	        				<textarea class="form-control" name="alamat" id="alamat" placeholder="Klik Disini"></textarea>
					  	</div>
					  	<div class="form-group">
	        				<label for="tgl_masuk"> Tanggal Masuk </label>
	        				<input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="">
					  	</div>
					  	<div class="form-group">
					  		<label for="tgl_keluar"> Tanggal Keluar </label>
					  		<input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" value="">
					  	</div>
					</form>
	      		</div>
	      		<div class="modal-footer">
	      			<input type="button" name="tutup" data-dismiss="modal" class="btn btn-secondary" value="Tutup">
	      			<input type="button" name="edit" class="btn btn-danger" value="" id="btnModalEdit">
	      		</div>	      		
	    	</div>
	  	</div>
	</div>