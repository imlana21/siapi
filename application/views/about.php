<!DOCTYPE html>
<html>
<head>
	<?php 
		$attrib['title']=$title;
		$this->load->view('_include/head', $attrib); 
	?>
</head>
<body>
	<?php 
		$this->load->view('_include/nav');
		$this->load->view('_include/admin/aside');
		$this->load->view('_include/about');
		$this->load->view('_include/footer');
	 ?>
</body>
</html>