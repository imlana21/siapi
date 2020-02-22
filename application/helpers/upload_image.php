<?php 

	public function upload_image($name)	{

		$config['upload_path'] = './assets/img/fprofile';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $name;
		$config['overwrite'] = true;
		$config['max_size'] = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}

		return "no_image.png";
	}
 ?>