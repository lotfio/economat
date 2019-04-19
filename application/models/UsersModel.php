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

   /**
	 * @param  int $id user id
	 * @return void
	 */
	public function updateUser($id)
	{
		$data = [ // data to be updated
					'u_name'  => $this->security->xss_clean($this->input->post('u_name')),
					'u_email' => $this->security->xss_clean($this->input->post('u_email')),
					'u_phone' => $this->security->xss_clean($this->input->post('u_phone'))
				];

				if(strtolower($this->session->logged->u_level) == 'administrator') // if administrator change level
				{
					$data['u_level'] = $this->security->xss_clean($this->input->post('u_level'));
				}

				// if user want to update image 
				if(!empty($_FILES['u_img']['name'])) // if image set update image
				{
					$config['upload_path']   = UP_IMG;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '2000';
					$config['encrypt_name']  = TRUE;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

			        if ( !$this->upload->do_upload("u_img"))
				        {
				                //and redirect to login page with flashdata invalid msg
						        $this->session->set_flashdata('error', $this->upload->display_errors());
						        return redirect(base_url().'users/update/'.$id);  
				        }
				        else
				        {

				                $up = (object) $this->upload->data();

				                $data['u_img'] = $up->file_name;

								$this->db->where('u_id', $id);
								
								if($this->db->update('users', $data))
								{
									$this->session->set_flashdata('success', "Profile Updated successfully");
								    return redirect(base_url().'users/update/'.$id);
								}
				        }
					}


				$this->db->where('u_id', $id);
				
				if($this->db->update('users', $data))
				{
					$this->session->set_flashdata('success', "Profile Updated successfully");
				    return redirect(base_url().'users/update/'.$id);
				}

				$this->session->set_flashdata('error', "Error Updating Profile");
				return redirect(base_url().'users/update/'.$id);
	}

	/**
	 * delete user
	 * 	
	 * @param  int   $id
	 * @return void
	 */
	public function deleteUser($id = null)
	{
		// no need to check since we did chek on the controller
		if($this->db->delete('users', array('u_id' => $id)))
		{
			$this->session->set_flashdata('success', "User Deleted successfully");
			return redirect(base_url().'users');
		}

		$this->session->set_flashdata('error', "Error deleting user");
		return redirect(base_url().'users');
	}

	/**
	 * add user method
	 */
	public function addUser()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules('u_name', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('u_email', 'Email',    'trim|required|valid_email');
		$this->form_validation->set_rules('u_pass', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('uc_pass', 'Confirm Password', 'trim|required|matches[u_pass]');
		$this->form_validation->set_rules('u_level', 'Permissions',    'trim|required');

		$data = [ // data to be updated
					'u_name'  => $this->security->xss_clean($this->input->post('u_name')),
					'u_email' => $this->security->xss_clean($this->input->post('u_email')),
					'u_phone' => $this->security->xss_clean($this->input->post('u_phone')),
					'u_passwd'  => SHA1($this->security->xss_clean($this->input->post('u_pass'))),
					'u_level'  => $this->security->xss_clean($this->input->post('u_level'))
				];

		if ($this->form_validation->run() == FALSE)
        {

			$this->session->set_flashdata('error', $this->form_validation->error_array());
			return redirect(base_url().'users/add'); 
        }
        else
        {

        	// if user want to update image 
			if(!empty($_FILES['u_img']['name'])) // if image set update image
			{
				$config['upload_path']   = UP_IMG;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '2000';
				$config['encrypt_name']  = TRUE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

		        if (!$this->upload->do_upload("u_img"))
			        {
			                //and redirect to login page with flashdata invalid msg
					        $this->session->set_flashdata('error', $this->upload->display_errors());
					        return redirect(base_url().'users/add');  
			        }
			        else
			        {

			                $up = (object) $this->upload->data();

			                $data['u_img'] = $up->file_name;

							
							if($this->db->insert('users', $data))
							{

								$this->session->set_flashdata('success', "User added successfully");
							    return redirect(base_url().'users/add');
							}
			        }
				}

				if($this->db->insert('users', $data))
				{
					$this->session->set_flashdata('success', "User added successfully");
				    return redirect(base_url().'users/add');
				}

				$this->session->set_flashdata('error', "Error Adding User");
				return redirect(base_url().'users/add');
        	
        }
	}
}