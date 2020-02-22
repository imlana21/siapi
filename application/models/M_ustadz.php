<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data
	 */
	class M_ustadz extends CI_Model
	{
		//Nama Database
		
		//Sukses
		function tampil_data() {
			return $this->db->get('db_Pengajar')->result();
		}	

		function hapus_data($id) {
			$this->db->where('id_pengajar', $id);

			return $this->db->delete('db_Pengajar');;
		}

		function tampilById($id) {
			return $this->db->get_where("db_Pengajar", ["id_pengajar" => $id])->row();
		}

		function update_data($value) {
			$id = $value['id_pengajar'];

			//Operasi Database
			$this->db->where('id_pengajar', $id);
			return $this->db->update("db_Pengajar", $value);
		}

		function tambah_data($value) {
			/*  Fungsi Database(Memasukan data ke DB)*/
			return $this->db->insert("db_Pengajar", $value);
		}

	}