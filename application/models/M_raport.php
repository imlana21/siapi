<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data raport
	 */
	class M_raport extends CI_Model
	{
		//Nama Database
		private $_table = 'db_Raport';

		//Sukses
		function tampil_data() {
			$this->db->select('*')->from($this->_table);

			return $this->db->get()->result();
		}		

		//Sukses
		function hapus_data($id) {
			$this->db->where('id_raport', $id);

			return $this->db->delete($this->_table);;
		}

		function update_data($value) {
			$this->id = $value['id_raport'];

			//Operasi Database
			$this->db->where('id_raport', $this->id);
			return $this->db->update($this->_table, $value);
		}

		function tambah_data($value) {
			/*  Fungsi Database(Memasukan data ke DB)*/
			
			return $this->db->insert($this->_table, $value);
		}

		function tampilById($id) {
			return $this->db->get_where($this->_table, ["id_raport" => $id])->row();
		}
	}