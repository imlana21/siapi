<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_login extends CI_Model {	

		function get_user($username, $passwd) {
			$sql="SELECT * FROM `db_Userpass` WHERE `username`='".$username."' AND `password`='".$passwd."'";

			return $this->db->query($sql);
		}
	}
