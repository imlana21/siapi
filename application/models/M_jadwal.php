<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Model untuk data Jadwal
	 */
	class M_jadwal extends CI_Model
	{
		//Sukses
		function tampil_data() {
			$this->db->select('id_jadwal, hari, nama_kelas, nama_mapel, nama_kitab, nama_pengajar');
			$this->db->from('db_Jadwal');
			$this->db->join('db_Kelas', 'db_Jadwal.kelas=db_Kelas.id_Kelas');
			$this->db->join('db_Mapel', 'db_Jadwal.mapel=db_Mapel.id_mapel');
			$this->db->join('db_Kitab', 'db_Jadwal.kitab=db_Kitab.id_kitab');
			$this->db->join('db_Pengajar', 'db_Jadwal.pengajar=db_Pengajar.id_pengajar');

			return $this->db->get()->result();
		}		

		//Sukses
		function hapus_data($id) {
			$this->db->where('id_jadwal', $id);

			return $this->db->delete('db_Jadwal');
		}

		function tampilById($id) {
			return $this->db->get_where('db_Jadwal', ["id_jadwal" => $id])->row();
		}

		function update_data($value) {
			$this->db->where('id_jadwal', $value['id_jadwal']);

			return $this->db->update('db_Jadwal', $value);
		}

		function tambah_data($value) {
			
			return $this->db->insert('db_Jadwal', $value);
		}

		//DropDown Menu
		function getKelas() {
			return $this->db->get('db_Kelas')->result();
		}

		function getMapel() {
			return $this->db->get('db_Mapel')->result();
		}

		function getKitab() {
			return $this->db->get('db_Kitab')->result();
		}

		function getPengajar() {
			return $this->db->get('db_Pengajar')->result();
		}

	}