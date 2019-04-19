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
}