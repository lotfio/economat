<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Services extends CI_Controller
{
	public function index()
	{
		$this->load->model('ServicesModel');

		$data['title'] = "SERVICES";
		$data['user'] = $this->session->logged;
		$data['services'] = $this->ServicesModel->getAll();

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('services/index');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}


	public function add()
	{
		$data['title'] = "ADD SERVICE";
		$data['user'] = $this->session->logged;

		if((strtolower($data['user']->u_level) == 'administrator') OR (strtolower($data['user']->u_level) == 'editor')) // only admins and editors
		{		
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('services/add');
			$this->load->view('template/foot');
			return $this->load->view('template/footer');
		}
		return show_404();
	}

	/**
	 * add service method
	 * 
	 * @return void
	 */
	public function proceedadd()
	{
		$data['user'] = $this->session->logged;
		if((strtolower($data['user']->u_level) == 'administrator') OR (strtolower($data['user']->u_level) == 'editor')) // only admins and editors
		{
			if($this->input->post('add'))
			{
				$this->load->model('ServicesModel');
				return $this->ServicesModel->addService();
			}

			return show_404();
		}

		return show_404();
	}
}