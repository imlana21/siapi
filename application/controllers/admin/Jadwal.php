<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Jadwal extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_jadwal');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Jadwal Madrasah';
			$attrib['header'] = 'Jadwal';
			$attrib['kelas'] = $this->m_jadwal->getKelas();
			$attrib['mapel'] = $this->m_jadwal->getMapel();
			$attrib['kitab'] = $this->m_jadwal->getKitab();
			$attrib['pengajar'] = $this->m_jadwal->getPengajar();

			$this->load->view('admin/datamaster/jadwal', $attrib);
		}

		public function tampil_data() {
			$data=$this->m_jadwal->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}		

		public function tampil_id() {
			$id = $this->input->post('id_jadwal');
			$data=$this->m_jadwal->tampilById($id);

			echo json_encode($data);
		}

		public function update_data() {
			$value = array(
				'id_jadwal' => $this->input->post('id_jadwal'),
				'hari' => $this->input->post('hari'),
				'kelas' => $this->input->post('kelas'),
				'mapel' => $this->input->post('mapel'),
				'kitab' => $this->input->post('kitab'),
				'pengajar' => $this->input->post('pengajar'),
			);

			$data = $this->m_jadwal->update_data($value);
			echo json_encode($data);
		}

		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_jadwal->hapus_data($id);
			
			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'hari' => $this->input->post('hari'),
				'kelas' => $this->input->post('kelas'),
				'mapel' => $this->input->post('mapel'),
				'kitab' => $this->input->post('kitab'),
				'pengajar' => $this->input->post('pengajar'),
			);

			$data = $this->m_jadwal->tambah_data($value);
			echo json_encode($data);
		}
	}