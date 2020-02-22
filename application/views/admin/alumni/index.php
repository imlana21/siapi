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
		$this->load->view('_include/admin/table/alumni');
		$this->load->view('_include/admin/modal/delete');
		$this->load->view('_include/admin/modal/edit-alumni');
		$this->load->view('_include/footer');
		$this->load->view('_include/admin/script/datatable');
		$this->load->view('_include/admin/script/data-alumni');
	 ?>
</body>
</html>