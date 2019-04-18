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
}