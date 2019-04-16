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



	public function proceededit($id = null)
	{			

		if($this->input->post('update')) // must be post
		{
			$id = (int) $id;
			$this->DashboardModel->updateUserInfo($id);
		}

		return redirect(base_url()."dashboard/accountedit");
	}
}
