<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged') == FALSE) redirect('login');
		$this->load->model('UsersModel');
	}

	/**
	 * users index page
	 * @return void
	 */
	public function index()
	{
		$data['title'] = "USERS";
		$data['user'] = $this->session->logged;

	   	$config = []; /**********************************************/
		$config["base_url"] = base_url() . "users/index";
		$config["total_rows"] = $this->UsersModel->countUsers();
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;

		$config['full_tag_open'] = "<ul class='pagination'>";
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] =  '<li class="page-item active"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li>';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';


	    $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</a></li>';


	    $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["users"] = $this->UsersModel->fetchUsers($config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('users/index');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}


	/**
	 * show users info method
	 * 
	 * @return void
	 */
	public function info($id = null)
	{
		$data['title'] = "USERS";
		$data['user']  = $this->session->logged;

		$data['info_user'] = $this->UsersModel->getById($id);

		$data['info_user_level'] = $this->UsersModel->getPermissionsLevel($data['info_user']->u_level);

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('users/info');
		$this->load->view('template/foot');
		$this->load->view('template/footer');
	}

}