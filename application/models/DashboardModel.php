<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DashboardModel extends CI_Model
{
	
	public function getPermissions()
	{
		$this->load->database();
		$query = $this->db->query("SELECT * FROM permissions");
		return $query->result_object(); //: FALSE;
	}
}