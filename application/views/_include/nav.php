<nav class="navbar navbar-dark bg-dark">
  	<a class="navbar-brand" href="#">
  		<img src="<?php echo base_url(); ?>assets/img/logo1.png">
  	</a>
  	<h5> <?php echo $header ?> </h5>
  	<div>
	  	<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    	Hello, <?php echo $_SESSION['ses_id']; ?>
	  	</a>
	  	<div class="dropdown-menu dropdown-menu-right">
	  		<a class="dropdown-item" href="<?php echo base_url().'index.php/login/signout';?>"> Logout </a>
	    	<div class="dropdown-divider"></div>
	  	</div>
	</div>
</nav>