<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CommandsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

	public function countCommands()
	{
		return $this->db->count_all("commands");
	}




	public function fetchCommands($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');    
		$this->db->from('commands');
		$this->db->join('services', 'commands.c_service = services.s_id');
		$this->db->join('users', 'commands.c_agent = users.u_id');
		$query = $this->db->get();


       if ($query->num_rows() > 0) {

           foreach ($query->result() as $row) {
               $data[] = $row;
           }

           //dd($data);
            return $data;
       }
       return false;
	}

}