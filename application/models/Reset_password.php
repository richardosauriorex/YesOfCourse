<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('reset_password', $value);
	}

	public function delete($id = '')
	{
		$this->db->where('user_id', $id);
		return $this->db->delete('reset_password');
	}

}

/* End of file Reset_password.php */
/* Location: ./application/models/Reset_password.php */