<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('multimedia', $value);
	}

	/*into value = array associative with fields and category_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('multimedia_id', $id);
		return $this->db->update('multimedia', $values);
	}

	/*into user_id, return a row with all fields from multimedia*/
	public function get($id = '')
	{
		$this->db->where('multimedia_id', $id);
		$result = $this->db->get('multimedia');
		return $result->row();
	}

	/*return select * from multimedia*/
	public function get_all_user($id)
	{
		$this->db->where('user_id', $id);
		$this->db->order_by('file_type');
		$result = $this->db->get('multimedia');
		return $result->result();
	}

	public function delete($id, $user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('multimedia_id', $id);
		$this->db->limit(1);
		return $this->db->delete('multimedia');
	}
	

}

/* End of file Multimedia.php */
/* Location: ./application/models/Multimedia.php */