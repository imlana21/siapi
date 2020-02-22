<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_dashboard extends CI_Model {

		function count_santri() {
			//$this->db->from('db_Santri')->where('id_santri', 'admin');
			//return $this->db->count_all_results();
			return $this->db->count_all('db_Santri');;
		}
		
		function count_pengajar() {
			return $this->db->count_all('db_Pengajar');
		}

		function count_alumni() {
			return $this->db->count_all('db_Alumni');
		}
	}