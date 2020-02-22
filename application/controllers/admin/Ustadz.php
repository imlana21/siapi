<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Ustadz extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_ustadz');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Data Ustadz';
			$attrib['header'] = 'Data Ustadz';
			$this->load->view('admin/datamaster/ustadz', $attrib);
		}

		public function tampil_data() {
			$data=$this->m_ustadz->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_ustadz->hapus_data($id);
			
			echo '{ "data" : '.json_encode($data).'}';
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_ustadz->tampilById($id);

			echo json_encode($data);
		}

		public function update_data() {
			$value = array(
				'id_pengajar' => $this->input->post('id_pengajar'),
				'nama_pengajar' => $this->input->post('nama_pengajar'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat')
			);

			$data = $this->m_ustadz->update_data($value);

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function tambah_data() {
			$value = array(
				'nama_pengajar' => $this->input->post('nama_pengajar'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat')
			);

			$data = $this->m_ustadz->tambah_data($value);
			
			echo '{ "data" : '.json_encode($data).'}';
		}
	}