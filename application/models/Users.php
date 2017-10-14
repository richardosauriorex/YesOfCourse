<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('users', $value);
	}
	/*into value = array associative with fields and user_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('user_id', $id);
		return $this->db->update('users', $values);
	}
	/*into user_id, return a row with all fields from users*/
	public function get($id = '')
	{
		$this->db->where('user_id', $id);
		$this->db->limit(1);
		$result = $this->db->get('users');
		return $result->row();
	}

	public function login($user_email = '', $password = '')
	{
		$this->db->where('user_email', $user_email);
		$this->db->where('password', $password);
		$this->db->limit(1);
		$result = $this->db->get('users');
		return $result->row();
	}
}

/* End of file Users.php */
/* Location: ./application/models/Users.php */