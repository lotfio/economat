<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DashboardModel extends CI_Model
{
	


	public function updateUser($id)
	{

		dd($_POST);
		$data = array(
               'u_name'  => $this->input->post("u_name"),
               'u_email' => $this->input->post("u_name"),
               'u_phone' => $this->input->post("u_name"), //TODO:: hadi
               'u_level' => $this->input->post("u_name"), // lazem u level ghir lel admin
            );
 
		$this->db->where('u_id', $id);
		$this->db->update('users', $data);

	}

	public function getUserById($id = 0)
	{
		$id = (int) $id;

		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("u_id", $id);
		$res = $this->db->get();

		return $res->num_rows() == 1 ? $res->row() : FALSE;
	}
	/**
	** get permissions
	**
	**/
	public function getPermissions()
	{
		$this->load->database();
		$query = $this->db->query("SELECT * FROM permissions");
		return $query->result_object(); //: FALSE;
	}
}