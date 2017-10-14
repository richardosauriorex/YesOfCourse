<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('categories', $value);
	}

	/*into value = array associative with fields and category_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('category_id', $id);
		return $this->db->update('categories', $values);
	}

	/*into user_id, return a row with all fields from categories*/
	public function get($id = '')
	{
		$this->db->where('category_id', $id);
		$result = $this->db->get('categories');
		return $result->row();
	}

	/*return select * from categories*/
	public function get_all()
	{
		$result = $this->db->get('categories');
		return $result->result();
	}

	public function delete($id)
	{
		$this->db->where('multimedia_id', $id);
		$this->db->limit(1);
		$this->db->delete('multimedia');
	}

}

/* End of file Categories.php */
/* Location: ./application/models/Categories.php */