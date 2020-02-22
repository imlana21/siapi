<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kitab extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_kitab');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Data Kitab';
			$attrib['header'] = 'Data Kitab';
			$this->load->view('admin/datamaster/kitab', $attrib);
		}

		public function tampil_data() {
			$i=1;
			$data=$this->m_kitab->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_kitab->hapus_data($id);
			
			echo json_encode($data);
		}


		public function update_data() {
			$value = array(
				'id_kitab' => $this->input->post('id_kitab'),
				'nama_kitab' => $this->input->post('nama_kitab'),
				'pengarang' => $this->input->post('pengarang'),
				'penerbit' => $this->input->post('penerbit'),
				'tahun' => $this->input->post('tahun')
			);

			$data = $this->m_kitab->update_data($value);
			echo json_encode($data);
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_kitab->tampilById($id);

			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'nama_kitab' => $this->input->post('nama_kitab'),
				'pengarang' => $this->input->post('pengarang'),
				'penerbit' => $this->input->post('penerbit'),
				'tahun' => $this->input->post('tahun')
			);

			$data = $this->m_kitab->tambah_data($value);
			echo json_encode($data);
		}
	}