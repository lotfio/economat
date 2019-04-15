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
		if ($this->session->userdata('logged') == TRUE) return redirect('panel');

		$data['title'] = "LOGIN";

		$this->load->view("template/header", $data);
		$this->load->view("login/index");
		$this->load->view("template/footer");
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
			unset($data->u_passwd); // remove passwd

			$this->session->set_userdata("logged", $data);
			return redirect(base_url() .'panel');
		}

		// error login

		//if no then set the session 'logged_in' as false
        $this->session->set_userdata('logged', false);
            
        //and redirect to login page with flashdata invalid msg
        $this->session->set_flashdata('msg', 'Username / Password Invalid');
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