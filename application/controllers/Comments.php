<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function create()
	{
		$this->load->model('Comment');
		$user_id = $this->session->userdata('user_id');
		$this->Comment->create($this->input->post(), $user_id);
		redirect("/Users/show/" . $this->input->post('wall_id'));
	}
	
}