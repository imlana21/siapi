<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Login Area
	 */
	class Login extends CI_Controller {	

		function __construct() {
			parent::__construct();
			$this->load->model('m_login');	//Untuk memuat data dari database
			
		}

		function index() {
			if($this->session->userdata('status') == "login"){
				redirect(base_url('index.php/admin/dashboard'));
			}

			$attrib['title']="SIAPI - Form Login";
			$this->load->view('login', $attrib);
		}

		function signin() {
			$username = $this->input->post('txtId');
			$password = $this->input->post('txtPassword');
			$cek = $this->m_login->get_user($username, md5($password));

			if ($cek->num_rows() > 0) {
				$data = $cek->row_array();

				$this->session->set_userdata('status', 'login');
				$this->session->set_userdata('ses_id', $data['username'] );
				redirect(base_url('index.php/admin/dashboard'));
			} else {
				$this->session->set_flashdata('info', 'Maaf anda tidak terdaftar sebagai siapapun');
				redirect(base_url());
			}
		}

		function signout() {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	