<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscriptions extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('inscriptions', $value);
	}

	/*into value = array associative with fields and inscription_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('inscription_id', $id);
		return $this->db->update('inscriptions', $values);
	}

	/*into user_id, return a row with all fields from inscriptions*/
	public function get($id = '')
	{
		$this->db->where('inscription_id', $id);
		$this->db->limit(1);
		$result = $this->db->get('inscriptions');
		return $result->row();
	}

	/*return select * from inscriptions*/
	public function get_all_user($id)
	{
		$this->db->where('user_id', $id);
		$result = $this->db->get('inscriptions');
		return $result->result();
	}

}

/* End of file Inscriptions.php */
/* Location: ./application/models/Inscriptions.php */