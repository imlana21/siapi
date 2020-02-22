<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * About Area
	 */
	class About extends CI_Controller {	
		
		function __construct() {
			parent::__construct();
			
			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title']="SIAPI - About";
			$attrib['header'] = "Tentang Kami";
			$this->load->view('about', $attrib);
		}
	}
