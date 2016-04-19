<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model {

	public function show($wall_id)
	{
		$query = "SELECT messages.id as 'messages.id', users.id as 'users.id', CONCAT(users.first_name, ' ', users.last_name) as 'name', messages.content, messages.updated_at, messages.user_id, messages.wall_id FROM users JOIN messages ON users.id = messages.user_id WHERE wall_id = ? ORDER BY messages.id DESC";
		$values = array($wall_id);
		return $this->db->query($query, $values)->result_array();
	}
	public function create($post, $user_id)
	{
		$query = "INSERT INTO messages (content, created_at, updated_at, user_id, wall_id) VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($post['message'], $user_id, $post['wall_id']);
		return $this->db->query($query, $values);
	}
}