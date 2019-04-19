<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ServicesModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * count services method
	 * @return int count
	 */
	public function countUsers() 
	{

       return $this->db->count_all("services");
    }


	public function getAll()
	{
		$query = $this->db->get("services");

       if ($query->num_rows() > 0) {

           return $query->result();
       }

       return FALSE;
	}
}