<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged') == FALSE) redirect('login');
		$this->load->model('DashboardModel');
	}


	/**
	 *  dashboard index
	 * @return void
	 */
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


	/**
	 * dashboard account page
	 * @return void
	 */
	public function account()
	{

		$data['title'] = "PANEL";
		$data['user'] = $this->session->logged;

		// last visit
		$this->load->helper('date');
		$data['last_visit'] = time_elapsed_string($data['user']->u_join_date);

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/account');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}


	/**
	 * dashboard edit account
	 * @return void
	 */
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


	/**
	 * perform edit profile
	 * @param  int $id user id
	 * @return
	 */	
	public function proceededit($id = null)
	{			

		if($this->input->post('update')) // must be post
		{
			$id = (int) $id;
			$this->DashboardModel->updateUserInfo($id);
		}

		return redirect(base_url()."dashboard/accountedit");
	}

	/**
	 * perform password updaet
	 * @param  int $id user id
	 * @return void
	 */
	public function proceededitPassword($id = null)
	{
		if($this->input->post('update')) // must be post
		{
			$id = (int) $id;
			$this->DashboardModel->updateUserPass($id);
		}

		return redirect(base_url()."dashboard/accountedit");
	}

}
