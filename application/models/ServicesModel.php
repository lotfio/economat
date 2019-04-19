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
	public function countServices() 
	{
       return $this->db->count_all("services");
    }

    /**
     * get service by id
     * @param  integer $id 
     * @return bool
     */
	public function getById($id = 0)
	{
		$id = (int) $id;

		$this->db->select("*");
		$this->db->from("services");
		$this->db->where("s_id", $id);
		$res = $this->db->get();
		return ($res->num_rows() == 1) ? $res->row() : FALSE;
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


	/**
	 * edit service model
	 * @param  int $id
	 * @return void
	 */
	public function editService($id)
	{
		$data = [ // data to be updated
			's_name'  => $this->security->xss_clean($this->input->post('s_name')),
			's_description' => $this->security->xss_clean($this->input->post('s_description')),
		];

		$this->db->where('s_id', $id);
		
		if($this->db->update('services', $data))
		{
			$this->session->set_flashdata('success', "Service Updated successfully");
		    return redirect(base_url().'services/edit/'.$id);
		}

		$this->session->set_flashdata('error', "Error Updating Service");
		return redirect(base_url().'services/edit/'.$id);
	}


	/**
	 * delete service method
	 * @param  int $id 
	 * @return void
	 */
	public function deleteService($id)
	{
	    // no need to check since we did chek on the controller
		if($this->db->delete('services', array('s_id' => $id)))
		{
			$this->session->set_flashdata('success', "Service Deleted successfully");
			return redirect(base_url().'services');
		}

		$this->session->set_flashdata('error', "Error deleting Service");
		return redirect(base_url().'services');
	}
}