<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Kelas Madrasah Diniyah
	 */
	class Kelas extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_kelas');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Data Kelas';
			$attrib['header'] = 'Data Kelas';
			$this->load->view('admin/datamaster/kelas', $attrib);
		}

		public function tampil_data() {
			$i=1;
			$data=$this->m_kelas->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_kelas->hapus_data($id);
			
			echo json_encode($data);
		}


		public function update_data() {
			$value = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'nama_kelas' => $this->input->post('nama_kelas')
			);

			$data = $this->m_kelas->update_data($value);
			echo json_encode($data);
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_kelas->tampilById($id);

			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'nama_kelas' => $this->input->post('nama_kelas')
			);

			$data = $this->m_kelas->tambah_data($value);
			echo json_encode($data);
		}
	}