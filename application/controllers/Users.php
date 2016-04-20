<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function form_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("pass_confirm", "Confirmation", "required|matches[password]");
	}
	public function create()
	{
		$this->form_validate();
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('new_user');
		}
		else
		{
			$this->load->model('Dashboard');
			$user = $this->input->post();
			$password = md5($this->input->post('password'));
			$this->Dashboard->add_user($user, $password);
			redirect("/Dashboards/admin");
		}
	}
	public function show()
	{
		$this->load->model('Dashboard');
		$user_id = $this->uri->segment(3);
		$user = $this->Dashboard->get_user_by_id($user_id);
		$this->load->view('wall_user_info', array('user' => $user));

		$this->load->model('Message');
		$this->load->model('Comment');
		$messages = $this->Message->show($user_id);
		foreach ($messages as $message) 
		{
			$comments = $this->Comment->show($message['messages.id']);
			$this->load->view('wall_messages_and_comments', array('messages' => $message, 'comments' => $comments));
		}
		$this->load->view('wall_footer');
	}
	public function destroy()
	{
		$this->load->model('Dashboard');
		$this->Dashboard->delete_user_by_id($this->uri->segment(3));
		redirect("/Dashboards/admin");
	}
	public function edit()
	{
		$this->load->model('Dashboard');
		
		if($this->session->userdata('admin') === true)
		{
			$this->form_validate();
			$user_id = $this->uri->segment(3);
			$user = $this->Dashboard->get_user_by_id($user_id);
			$this->load->view('admin_edit_user', array('user' => $user));
			if($this->input->post('admin_edit_user_password'))
			{
				if($this->form_validation->run() === FALSE)
					{
						$this->session->set_flashdata('error', validation_errors());
						redirect("/Users/edit/" . $this->input->post('admin_edit_user_password'));
					}
				else
				{
					$password = md5($this->input->post('password'));
					$user_id = $this->input->post('admin_edit_user_password');
					$this->Dashboard->update_user_password($password, $user_id);
					redirect("/Dashboards/admin");
				}
			}
			else if($this->input->post('admin_edit_user_info'))
			{
				$user = $this->input->post();
				$user_id = $this->input->post('admin_edit_user_info');
				$this->Dashboard->admin_update_user_info($user, $user_id);
				redirect("/Dashboards/admin");
			}
		}
		else if($this->session->userdata('admin') === false)
		{
			$this->form_validate();
			$user_id = $this->session->userdata('user_id');
			$user = $this->Dashboard->get_user_by_id($user_id);
			$this->load->view('edit_profile', array('user' => $user));
			if($this->input->post('user_edit_password'))
			{
				if($this->form_validation->run() === false)
				{
					$this->session->set_flashdata('error', validation_errors());
					redirect("Users/edit");
					
				}
				else
				{
					$password = md5($this->input->post('password'));
					$this->Dashboard->update_user_password($password, $user_id);
					redirect("/Dashboards/user");
				}
			}
			if($this->input->post('user_edit_info'))
			{
				$this->load->model('Dashboard');
				$user = $this->input->post();
				$this->Dashboard->update_user_info($user, $user_id);
				redirect("/Dashboards/user");
			}
		}
		else
		{
			redirect("/");
		}
	}
}