<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Message");
	}

	public function create()
	{
		$this->Message->create($this->input->post(), $this->session->userdata('user_id'));
		redirect("/Users/show/" . $this->input->post('wall_id'));
	}
}