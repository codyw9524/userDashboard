<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {

	function get_all_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function validate_user($id, $password)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($id, $password);
		return $this->db->query($query, $values)->row_array();
	}
	function add_user($user, $password)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $password, "user");
		return $this->db->query($query, $values);
	}
	function get_user_by_id($user_id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
	}
	function admin_update_user_info($user, $user_id)
	{
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ?, updated_at = 'NOW()' WHERE id = ?";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['user_level'], $user_id);
		$this->db->query($query, $values);
	}
	function update_user_password($password, $user_id)
	{
		$query = "UPDATE users SET password = ? WHERE id = ?";
		$values = array($password, $user_id);
		$this->db->query($query, $values);
	}
	function update_user_info($user, $user_id)
	{
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, description = ?, updated_at = NOW() WHERE id = ?";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['description'], $user_id);
		$this->db->query($query, $values);
	}
	function delete_user_by_id($user_id)
	{
		$this->db->query("DELETE FROM users WHERE id = ?", array($user_id));
	}
}	