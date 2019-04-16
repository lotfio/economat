<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	** login to our application method
	**
	**/
	public function index($name = null)
	{	
		// login
		if ($this->session->userdata('logged') == TRUE) return redirect('dashboard');
		$this->load->view("login/index");
	}


	/**
	** perform login
	**
	**/
	public function proceed()
	{

		$this->load->model('loginModel');
		
		// logged in

		if($this->loginModel->performLogin())
		{
			$data =  $this->loginModel->performLogin();
			$data->u_level = $data->p_name;
			unset($data->u_passwd, $data->p_id, $data->p_name, $data->p_level); // remove passwd and unneccessary data

			$this->session->set_userdata("logged", $data);
			return redirect(base_url() .'dashboard');
		}

		// error login

		//if no then set the session 'logged_in' as false
        $this->session->set_userdata('logged', false);
            
        //and redirect to login page with flashdata invalid msg
        $this->session->set_flashdata('msg', 'Invalid Username OR Password');
        return redirect(base_url().'login');    
	}


	/**
	** log out method
	**/
	public function logOut()
	{
		$this->session->unset_userdata('logged');
        redirect(base_url().'login');
	}
}
