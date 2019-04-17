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

               $data[] = $row;
           }

           return $data;
       }
       return false;
   }
}