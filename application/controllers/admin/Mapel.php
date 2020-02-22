<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Mapel extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_mapel');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Data Mapel';
			$attrib['header'] = 'Data Mapel';
			$this->load->view('admin/datamaster/mapel', $attrib);
		}

		public function tampil_data() {
			$i=1;
			$data=$this->m_mapel->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_mapel->hapus_data($id);
			
			echo json_encode($data);
		}


		public function update_data() {
			$value = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'nama_mapel' => $this->input->post('nama_mapel')
			);

			$data = $this->m_mapel->update_data($value);
			echo json_encode($data);
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_mapel->tampilById($id);

			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'nama_mapel' => $this->input->post('nama_mapel')
			);

			$data = $this->m_mapel->tambah_data($value);
			echo json_encode($data);
		}
	}