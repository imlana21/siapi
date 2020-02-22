<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data santri
	 */
	class M_santri extends CI_Model
	{
		//Nama Database
		private $_table = 'db_Santri';
		private $_kelas = 'db_Kelas';


		function tampil_data() {
			//Select tabel 'db_Santri'
			$this->db->select('id_santri, nama_santri, gender, alamat, phone, tgl_masuk, nama_kelas');
			//Join tabel 'db_Santri' dengan 'db_Kelas'
			$this->db->join($this->_kelas, 'kelas = id_kelas');
			//Get Data Santri
			return $this->db->get('db_Santri')->result();
		}		

		function hapus_data($id) {
			$this->db->where('id_santri', $id);

			return $this->db->delete('db_Santri');;
		}

		function set_alumni($id) {
			//Query Insert Data dari db_Santri ke db_Alumni
			$sql = "INSERT INTO `db_Alumni`(`nama_alumni`, `gender`, `alamat`, `phone`, `tgl_masuk`, `tgl_keluar`)";
			$sql .= "SELECT `nama_santri`, `gender`, `alamat`, `phone`, `tgl_masuk`, CURRENT_DATE() FROM `db_Santri` WHERE id_santri = '".$id."'";
			//Query Hapus Data di db_Santri
			$sql2 = "DELETE FROM `db_Santri` WHERE id_santri = '".$id."';";

			$this->db->query($sql);
			return $this->db->query($sql2);;
		}

		function update_data($value) {
			$id = $value['id_santri'];

			//Operasi Database
			$this->db->where('id_santri', $id);
			return $this->db->update($this->_table, $value);
		}

		function tambah_data($value) {
			/*  Fungsi Database(Memasukan data ke DB)*/
			return $this->db->insert($this->_table, $value);
		}

		function tampilById($id) {
			return $this->db->get_where($this->_table, ["id_santri" => $id])->row();
		}

		function get_kelas() {
			return $this->db->get('db_Kelas')->result();
		}
	}