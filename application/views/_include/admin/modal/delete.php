	<!-- Modal Hapus -->
	<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="modalHapusTitle"> Hapus Data </h5> 
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	      		  	</button>
	      		</div>
	      		<div class="modal-body">
	        		<p> Yakin ingin menghapus data dengan id
	        			<form method="POST">
	        				<input type="text" name="deleteValue" value="" style="border: none; font-weight: bold; width: 100%; text-align: center;">
	        			</form>
	        		</p>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
	        		<button type="button" class="btn btn-danger" id="btnModalHapus"> Hapus </button>
	        		<button type="button" class="btn btn-danger hide" id="btnModalAlumni"> Set Alumni </button>
	      		</div>
	    	</div>
	  	</div>
	</div>
