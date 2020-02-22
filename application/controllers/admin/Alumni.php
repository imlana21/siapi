<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Alumni Pondok
	 */
	class Alumni extends CI_Controller {
		//Fungsi yang pertama kali dijalankan saat class dipanggil
		function __construct()
		{
			//Fungsi untuk Inherit dari Class Induk
			parent::__construct();
			$this->load->model('m_alumni');
			
			//Cek Status Login
			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title']='SIAPI - Data Alumni';
			$attrib['header'] = 'Data Alumni';

			$this->load->view('admin/alumni/index', $attrib);
		}

		public function tampil_data() {
			$data=$this->m_alumni->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_alumni->hapus_data($id);
			
			echo '{ "data" : '.json_encode($data).'}';
		}


		public function update_data() {
			$value = array(
				'id_alumni' => $this->input->post('id_alumni'),
				'nama_alumni' => $this->input->post('nama_alumni'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat')
			);

			$data = $this->m_alumni->update_data($value);

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_alumni->tampilById($id);

			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'nama_alumni' => $this->input->post('nama_alumni'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'tgl_keluar' => $this->input->post('tgl_keluar')
			);

			$data = $this->m_alumni->tambah_data($value);
			
			echo '{ "data" : '.json_encode($data).'}';
		}

	}