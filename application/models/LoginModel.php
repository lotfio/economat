<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginModel extends CI_Model
{
	
	public function performLogin()
	{
		// validate
		$u_email = $this->security->xss_clean($this->input->post('u_email'));
    	$u_pass  = SHA1($this->security->xss_clean($this->input->post('u_pass')));

    	$this->db->where('u_email', $u_email);
	    $this->db->where('u_passwd', $u_pass);
	    $result = $this->db->get('users');

	    return $result->num_rows() == 1 ? $result->row() : FALSE;
	}
}

