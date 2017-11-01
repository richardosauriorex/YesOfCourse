<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('users', $value);
	}
	/*into value = array associative with fields and user_id return true or false*/
	public function update($id = '', $value = '')
	{
		$this->db->where('user_id', $id);
		return $this->db->update('users', $value);
	}
	/*into user_id, return a row with all fields from users*/
	public function get($values = '')
	{
		$this->db->where($values);
		$this->db->limit(1);
		$result = $this->db->get('users');
		return $result->row();
	}

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */