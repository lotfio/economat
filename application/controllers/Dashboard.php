<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged') == FALSE) redirect('login');
		$this->load->model('DashboardModel');
	}

	public function index()
	{
		$data['title'] = "PANEL";
		$data['user'] = $this->session->logged;

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/welcome');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}


	public function account()
	{

		$data['title'] = "PANEL";
		$data['user'] = $this->session->logged;
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/account');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}


	public function accountedit()
	{

		$data['title'] = "EDIT ACCOUNT";
		$data['user'] = $this->session->logged;

		// get uers permissions
		$data['permissions'] = $this->DashboardModel->getPermissions();

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/accountedit');
		$this->load->view('template/foot');
		return $this->load->view('template/footer');

	}



	public function proceededit()
	{
			
		// if user want to update image 
		if(!empty($_FILES['u_img']['name']))
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
		                $data = array('upload_data' => $this->upload->data());
		                $this->session->set_flashdata('success', "Profile Image Updated successfully");
				        return redirect(base_url().'dashboard/accountedit'); 
		        }
			}

			if($this->input->post('update'))
			{
				$loggedUser = $this->session->logged->u_id; 

				if($this->DashboardModel->updateUser($loggedUser))
				{
					$this->session->set_flashdata('success', "Profile Updated successfully");
				     return redirect(base_url().'dashboard/accountedit');
				}


				$this->session->set_flashdata('error', "Error Updating Profile");
				return redirect(base_url().'dashboard/accountedit');
			}

			return redirect(base_url().'dashboard/accountedit'); 
		}
}
