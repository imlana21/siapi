<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html>
<head>
	<?php 
		$attrib['title']=$title;
		$this->load->view('_include/head.php', $attrib); 
	?>
</head>
<body id="login">
	<div class="login-area">
		<div class="login-form">
			<form action="<?php echo base_url(); ?>index.php/login/signin" method="POST" onsubmit="return loginRequired();">
				<div class="form-group center">
					<img src="assets/img/logo.png" width="120px" alt="Logo Pesantren Inayatullah">
				</div>
			  	<div class="form-group">
			    	<label for="txtId"> ID </label>
			    	<input type="text" class="form-control" placeholder="Masukan ID" name="txtId" id="txtId">
			  	</div>
			  	<div class="form-group">
			    	<label for="txtPassword"> Password </label>
			    	<input type="password" class="form-control" placeholder="Masukan Password" name="txtPassword" id="txtPassword">
			  	</div>
			  	<div class="form-group">
			  		<?php 
			  			$info = $this->session->flashdata('info');

			  			if (isset($info)) {
			  				echo $info;
			  			}
			  		 ?>
			  		<button type="submit" class="btn btn-primary align-right"> Submit </button>
			  	</div>
			</form>
		</div>
	</div>
	
	<?php $this->load->view('_include/footer') ?>
	<?php $this->load->view('_include/script/form') ?>
</body>
</html>