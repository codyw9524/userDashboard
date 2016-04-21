<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard');
	}

	function form_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("pass_confirm", "Confirmation", "required|matches[password]");
	}
	public function index()
	{
		$this->load->view('home');
	}
	public function sign_in()
	{
		$this->load->view('sign_in');
	}
	public function validate_user()
	{
		$user = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$result = $this->Dashboard->validate_user($user, $password);
		if(count($result) > 0 && $result['user_level'] === "admin")
		{
			$user_info = array(
				'user_id' => $result['id'],
				'first_name' => $result['first_name'],
				'last_name' => $result['last_name'],
				'email' => $result['email'],
				'admin' => true,
				'is_logged_in' => true
				);
			$this->session->set_userdata($user_info);
			redirect("/Dashboards/admin");
		}
		else if(count($result) > 0 && $result['user_level'] === "user")
		{
			$user_info = array(
				'user_id' => $result['id'],
				'first_name' => $result['first_name'],
				'last_name' => $result['last_name'],
				'email' => $result['email'],
				'admin' => false,
				'is_logged_in' => true
				);
			$this->session->set_userdata($user_info);
			redirect("/Dashboards/user");
		}
		else
		{
			$this->session->set_flashdata('error', "<p style='color: red'>Email and/or password provided were incorrect</p>");
			redirect("/Dashboards/sign_in");
		}
	}
	public function register()
	{	
		$this->form_validate();
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('register');
		}
	}
	public function register_user()
	{
		$this->form_validate();
		if($this->form_validation->run() === FALSE)
		{
			$this->register();
		}
		else
		{
			$password = md5($this->input->post('password'));
			$user = $this->input->post();
			$this->Dashboard->add_user($user, $password);
			$this->session->set_flashdata('registration_confirmed', "<p style='color: green'>Thank you for registering.  You may now log in.</p>");
			redirect("/Dashboards/sign_in");
		}
	}
	public function admin()
	{
		if($this->input->post('action') === "add_user")
		{
			redirect("/Users/create");
		}
		$all_users = $this->Dashboard->get_all_users();
		if($this->session->userdata('admin') === true)
		{
			$this->load->view('admin_dashboard', array('users' => $all_users));
		}
		else
		{
			redirect("/");
		}
	}
	public function user()
	{
		if($this->session->userdata('is_logged_in') === true)
		{
			$users = $this->Dashboard->get_all_users();
			$this->load->view("user_dashboard", array('users' => $users));
		}
		else
		{
			redirect("/");
		}
	}
	public function log_off()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
}
