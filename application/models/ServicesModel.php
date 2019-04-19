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

	public function addService()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules('s_name', 'Service Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('s_description', 'Service Description',    'trim|required|min_length[10]');

		$data = [ // data to be updated
					's_name'  => $this->security->xss_clean($this->input->post('s_name')),
					's_description' => $this->security->xss_clean($this->input->post('s_description'))
				];

		
		if ($this->form_validation->run() == FALSE)
        {

			$this->session->set_flashdata('error', $this->form_validation->error_array());
			return redirect(base_url().'services/add'); 
        }
        else
        {

    		if($this->db->insert('services', $data))
			{
				$this->session->set_flashdata('success', "Service added successfully");
			    return redirect(base_url().'services/add');
			}

			$this->session->set_flashdata('error', "Error Adding Service");
			return redirect(base_url().'services/add');
        }
	}
}