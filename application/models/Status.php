<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('status', $value);
	}

	/*into value = array associative with fields and status_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('status_id', $id);
		return $this->db->update('status', $values);
	}

	/*into user_id, return a row with all fields from status*/
	public function get($id = '')
	{
		$this->db->where('status_id', $id);
		$this->db->limit(1);
		$result = $this->db->get('status');
		return $result->row();
	}

	/*return select * from status*/
	public function get_all()
	{
		$result = $this->db->get('status');
		return $result->result();
	}

	/*update status in table where id_field = id*/
	public function set_status($table = '', $field_id = '', $id = '', $status_id = '')
	{
		$this->db->where($id_field, $id);
		return $this->db->update($table, ['status_id' => $status_id]);
	}

}

/* End of file Status.php */
/* Location: ./application/models/Status.php */