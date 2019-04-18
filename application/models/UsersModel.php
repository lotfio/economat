<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UsersModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}


	/**
	 * count users method
	 * @return int count
	 */
	public function countUsers() {

       return $this->db->count_all("users");
   }

   	public function getById($id = 0)
	{
		$id = (int) $id;

		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("u_id", $id);
		$res = $this->db->get();

		if($res->num_rows() == 1)
		{
			$row = $res->row();
			$row->u_level = $this->getPermissionsLevel($row->u_level) ? $this->getPermissionsLevel($row->u_level) : NULL;
			return $row;

		}
		return FALSE;
	}

	/**
	 * get user permission
	 * 
	 * @param  int $p_level
	 * @return mixed
	 */
	public function getPermissionsLevel($p_level)
	{
		$this->db->select("*");
		$this->db->from("permissions");
		$this->db->where("p_level", $p_level);
		$res = $this->db->get();

		return $res->num_rows() == 1 ? $res->row()->p_name : FALSE;
	}


   /**
    * fetch users
    * @param  int $limit
    * @param  int $start
    * @return mixed|bool
    */
   public function fetchUsers($limit, $start) {

       $this->db->limit($limit, $start);

       $query = $this->db->get("users");

       if ($query->num_rows() > 0) {

           foreach ($query->result() as $row) {
           		// get permissions level directly
           		$row->u_level = $this->getPermissionsLevel($row->u_level) ? $this->getPermissionsLevel($row->u_level) : NULL;

               $data[] = $row;
           }

           return $data;
       }
       return false;
   }
}