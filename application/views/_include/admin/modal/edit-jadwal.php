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
	        				<label for="hari"> Hari </label>
	        				<select name="hari" id="hari" class="form-control">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<option value="Senin"> Senin </option>
	        					<option value="Selasa"> Selasa </option>
	        					<option value="Rabu"> Rabu </option>
	        					<option value="Kamis"> Kamis </option>
	        					<option value="Jum'at"> Jum'at </option>
	        					<option value="Sabtu"> Sabtu </option>
	        					<option value="Ahad"> Ahad </option>
	        				</select>
					  	</div>
					  	<div class="form-group">
	        				<label for="kelas"> Kelas </label>
	        				<select name="kelas" class="form-control" placeholder="Klik Disini" id="kelas">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<?php foreach ($kelas as $k) { ?>
	        						<option value="<?php echo $k->id_kelas; ?>"> <?php echo $k->nama_kelas; ?> </option>
	        					<?php } ?>
	        				</select>
					  	</div>
					  	<div class="form-group">
	        				<label for="mapel"> Mapel </label>
	        				<select name="mapel" class="form-control" placeholder="Klik Disini" id="mapel">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<?php foreach ($mapel as $m) { ?>
	        						<option value="<?php echo $m->id_mapel; ?>"> <?php echo $m->nama_mapel; ?> </option>
	        					<?php } ?>
	        				</select>
					  	</div>
					  	<div class="form-group">
	        				<label for="kitab"> Kitab </label>
	        				<select name="kitab" class="form-control" placeholder="Klik Disini" id="kitab">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<?php foreach ($kitab as $ki) { ?>
	        						<option value="<?php echo $ki->id_kitab; ?>"> <?php echo $ki->nama_kitab; ?> </option>
	        					<?php } ?>
	        				</select>
					  	</div>
					  	<div class="form-group">
	        				<label for="pengajar"> Pengajar </label>
	        				<select name="pengajar" class="form-control" placeholder="Klik Disini" id="pengajar">
	        					<option value="" disabled=""> Klik Disini </option>
	        					<?php foreach ($pengajar as $p) { ?>
	        						<option value="<?php echo $p->id_pengajar; ?>"> <?php echo $p->nama_pengajar; ?> </option>
	        					<?php } ?>
	        				</select>
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