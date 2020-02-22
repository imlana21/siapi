<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Santri extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_santri');

			if($this->session->userdata('status') != "login"){
				redirect(base_url());
			}
		}

		function index() {
			$attrib['title'] = 'SIAPI - Data Santri';
			$attrib['header'] = 'Data Santri';
			$attrib['kelas'] = $this->m_santri->get_kelas();

			$this->load->view('admin/datamaster/santri', $attrib);
		}

		//Fungsi Tampil Data Santri
		public function tampil_data() {
			$data=$this->m_santri->tampil_data();

			echo '{ "data" : '.json_encode($data).'}';
		}

		//Fungsi Hapus Data Santri secara Permanent
		public function hapus_data() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_santri->hapus_data($id);
			
			echo '{ "data" : '.json_encode($data).'}';
		}

		//Fungsi Hapus Data dan menjadikannya sebagai alumni
		public function set_alumni() {
			$id = $this->input->post('deleteValue');
			$data=$this->m_santri->set_alumni($id);
			
			echo '{ "data" : '.json_encode($data).'}';
		}

		//Function update Data Santri
		public function update_data() {
			$value = array(
				'id_santri' => $this->input->post('id_santri'),
				'nama_santri' => $this->input->post('nama_santri'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'kelas' => $this->input->post('kelas')
			);

			$data = $this->m_santri->update_data($value);

			echo '{ "data" : '.json_encode($data).'}';
		}

		public function tampil_id() {
			$id = $this->input->post('id');
			$data=$this->m_santri->tampilById($id);

			echo json_encode($data);
		}

		public function tambah_data() {
			$value = array(
				'nama_santri' => $this->input->post('nama_santri'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'kelas' => $this->input->post('kelas'),
				'tgl_masuk' => date("Y-m-d")
			);

			$data = $this->m_santri->tambah_data($value);
			
			echo '{ "data" : '.json_encode($data).'}';
		}
	}