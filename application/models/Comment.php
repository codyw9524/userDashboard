<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model {

	public function create($post, $user_id)
	{
		$query = "INSERT INTO comments (content, message_id, user_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($post['comment'], $post['message_id'], $user_id);
		$this->db->query($query, $values);
	}
	public function show($message_id)
	{
		$query = "SELECT users.id as 'users.id', messages.id as 'messages.id', comments.id as 'comments.id', CONCAT(users.first_name, ' ', users.last_name) as 'name', comments.content, comments.updated_at FROM users JOIN comments ON users.id = comments.user_id JOIN messages ON messages.id = comments.message_id WHERE messages.id = ? ORDER BY comments.id ASC";
		$values = array($message_id);
		return $this->db->query($query, $values)->result_array();
	}
}