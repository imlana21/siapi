<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Dashboard (Halaman Utama)
	 */
	class Dashboard extends CI_Controller {	
		function __construct(){
			//Fungsi untuk Inherit dari Class Induk
			parent::__construct();
			$this->load->model('m_dashboard');
			
			//Cek Status Login
			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}
	 
		function index(){
			$attrib['title']="SIAPI - Dashboard";
			$attrib['header']="Dashboard";
			$attrib['jml_santri']=$this->m_dashboard->count_santri();
			$attrib['jml_pengajar']=$this->m_dashboard->count_pengajar();
			$attrib['jml_alumni']=$this->m_dashboard->count_alumni();
			$this->load->view('admin/index', $attrib);
		}

	}