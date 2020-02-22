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
		$attrib['header'] = $header;
		$attrib['jml_santri'] = $jml_santri;
		$attrib['jml_pengajar'] = $jml_pengajar;
		$attrib['jml_alumni'] = $jml_alumni;
		$this->load->view('_include/nav', $attrib);
		$this->load->view('_include/admin/aside');
		$this->load->view('_include/admin/dashboard', $attrib);
		$this->load->view('_include/footer');
	 ?>
</body>
</html>