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
	      			<form onsubmit="return inputRequired();">
					  	<div class="form-group id-row">
					    	<label for="id"> ID </label>
					    	<input type="text" class="form-control" name="id" id="id" value="" disabled="" required="">
					  	</div>
					  	<div class="form-group">
	        				<label for="nama"> Nama Mata Pelajaran </label>
	        				<input type="text" class="form-control" name="nama" id="nama" value="" placeholder="Klik Disini">
					  	</div>
					</form>
	      		</div>
	      		<div class="modal-footer">
	      			<input type="button" name="tutup" data-dismiss="modal" class="btn btn-secondary" value="Tutup">
	      			<input type="button" name="edit" class="btn btn-danger" value="" id="btnModal">
	      		</div>	      		
	    	</div>
	  	</div>
	</div>