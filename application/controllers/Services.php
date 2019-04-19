<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Services extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ServicesModel');

	}

	public function index()
	{

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
				return $this->ServicesModel->addService();
			}

			return show_404();
		}

		return show_404();
	}

	public function edit($id)
	{	
		$data['title'] = "UPDATE SERVICE";
		$data['user'] = $this->session->logged;

		if((strtolower($data['user']->u_level) == 'administrator') OR (strtolower($data['user']->u_level) == 'editor')) // only admins and editors
		{
			$id = (int) $id;

			if($this->ServicesModel->getById($id)){	

				$data['srv'] = $this->ServicesModel->getById($id);

				$this->load->view('template/header', $data);
				$this->load->view('template/navbar', $data);
				$this->load->view('template/sidebar', $data);
				$this->load->view('services/edit');
				$this->load->view('template/foot');
				return $this->load->view('template/footer');
			}
		}
		
		return show_404();
	}

	public function proceedEdit($id)
	{
		$data['user'] = $this->session->logged;

		if((strtolower($data['user']->u_level) == 'administrator') OR (strtolower($data['user']->u_level) == 'editor')) // only admins and editors
		{
			$id = (int) $id;

			if($this->ServicesModel->getById($id)){	
				
				$this->ServicesModel->editService($id);
			}
		}
		
		return show_404();
	}

	/**
	 * delete service method
	 * 
	 * @param  int $id
	 * @return void
	 */
	public function delete($id = null)
	{
		$data['user'] = $this->session->logged;

		if((strtolower($data['user']->u_level) == 'administrator') OR (strtolower($data['user']->u_level) == 'editor')) // only admins and editors
		{
			$id = (int) $id;

			return $this->ServicesModel->deleteService($id);
		}

		return show_404();
	}
}