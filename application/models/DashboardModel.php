<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DashboardModel extends CI_Model
{

	/**
	 * @param  id
	 * @return void
	 */
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
		$query = $this->db->query("SELECT * FROM permissions");
		return $query->result_object(); //: FALSE;
	}


	/**
	 * update user password
	 * @param  int $id user id
	 * @return void
	 */
	public function updateUserPass($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('u_pass', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('uc_pass', 'Confirm Password', 'trim|required|matches[u_pass]');


		if ($this->form_validation->run() == FALSE)
        {

			$this->session->set_flashdata('p_error', $this->form_validation->error_array());
			return redirect(base_url().'dashboard/accountedit'); 
        }
        else
        {
       		$data = [ 'u_passwd'  => SHA1($this->security->xss_clean($this->input->post('u_pass')))];

			$this->db->where('u_id', $id);
								
			if($this->db->update('users', $data))
			{
				$this->session->set_flashdata('p_success', "Password Updated successfully");
				return redirect(base_url().'dashboard/accountedit');
			}


        }
	}
	/**
	 * @param  int $id user id
	 * @return void
	 */
	public function updateUserInfo($id)
	{
		$data = [ // data to be updated
					'u_name'  => $this->security->xss_clean($this->input->post('u_name')),
					'u_email' => $this->security->xss_clean($this->input->post('u_email')),
					'u_phone' => $this->security->xss_clean($this->input->post('u_phone'))
				];

				if($this->session->logged->u_level == 'Administrator') // if administrator change level
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
						        return redirect(base_url().'dashboard/accountedit');  
				        }
				        else
				        {

				                $up = (object) $this->upload->data();

				                $data['u_img'] = $up->file_name;

								$this->db->where('u_id', $id);
								
								if($this->db->update('users', $data))
								{
									// refresh session
									$this->session->unset_userdata('logged');
									$this->session->set_userdata('logged', $this->fetchloggedInUserWithLevel($id));

									$this->session->set_flashdata('success', "Profile Updated successfully");
								    return redirect(base_url().'dashboard/accountedit');
								}
				        }
					}


				$this->db->where('u_id', $id);
				
				if($this->db->update('users', $data))
				{
					// refresh session
					$this->session->unset_userdata('logged');
					$this->session->set_userdata('logged',$this->fetchloggedInUserWithLevel($id));

					$this->session->set_flashdata('success', "Profile Updated successfully");
				    return redirect(base_url().'dashboard/accountedit');
				}

				$this->session->set_flashdata('error', "Error Updating Profile");
				return redirect(base_url().'dashboard/accountedit');
	}

	/**
	 * @param  id
	 * @return void
	 */
	public function fetchloggedInUserWithLevel($id)
	{
		$usr = $this->getUserById($id);
		$q   = $this->db->query("SELECT * FROM permissions WHERE p_level='$usr->u_level'");
		unset($usr->u_passwd);
		$usr->u_level = $q->row_object()->p_name;

		return $usr;
	}
}