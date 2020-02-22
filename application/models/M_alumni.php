<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data Alumni
	 */
	class M_alumni extends CI_Model 	{
		//Nama Database
		private $_table = 'db_Alumni';

		//Tampil Data
		function tampil_data() {
			$this->db->select('*')->from($this->_table);
			
			return $this->db->get()->result();
		}		

		//Hapus Data
		function hapus_data($id) {
			$this->db->where('id_alumni', $id);

			return $this->db->delete($this->_table);;
		}

		//Update Data
		function update_data($value) {
			$this->id = $value['id_alumni'];

			//Operasi Database
			$this->db->where('id_alumni', $this->id);
			return $this->db->update($this->_table, $value);
		}

		//Tambah Data
		function tambah_data($value) {
			/*  Fungsi Database(Memasukan data ke DB)*/
			return $this->db->insert($this->_table, $value);
		}

		//Tampil Data By Id
		function tampilById($id) {
			return $this->db->get_where($this->_table, ["id_alumni" => $id])->row();
		}
	}