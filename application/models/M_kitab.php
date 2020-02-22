<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data santri
	 */
	class M_kitab extends CI_Model
	{
		//Nama Database
		private $_table = "db_Kitab";

		//Sukses
		function tampil_data() {
			$this->db->select('*');
			$this->db->from($this->_table);

			return $this->db->get()->result();
		}		

		//Sukses
		function hapus_data($id) {
			$this->db->where('id_kitab', $id);

			return $this->db->delete($this->_table);;
		}

		function update_data($value) {
			$this->id = $value['id_kitab'];

			//Operasi Database
			$this->db->where('id_kitab', $this->id);
			return $this->db->update($this->_table, $value);
		}

		function tambah_data($value) {
			/*  Fungsi Database(Memasukan data ke DB)*/
			return $this->db->insert($this->_table, $value);
		}

		function tampilById($id) {
			return $this->db->get_where($this->_table, ["id_kitab" => $id])->row();
		}


	}