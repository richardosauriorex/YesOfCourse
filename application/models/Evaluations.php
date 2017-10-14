<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluations extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('evaluations', $value);
	}

	/*into value = array associative with fields and evaluation_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('evaluation_id', $id);
		return $this->db->update('evaluations', $values);
	}

	/*into evaluation_id, return a row with all fields from evaluations*/
	public function get($id = '')
	{
		$this->db->where('evaluation_id', $id);
		$this->db->limit(1);
		$result = $this->db->get('evaluations');
		return $result->row();
	}

	/*into lesson_id , return select * from evaluations where lesson_id = lesson_id */
	public function get_lesson_evaluations($id = '')
	{
		$this->db->where('course_id', $id);
		$result = $this->db->get('evaluations');
		return $result->result();
	}

	public function delete($id ='')
	{
		$this->db->where('evaluation_id', $id);
		$this->db->limit(1);
		return $this->db->delete('evaluations');
	}


}

/* End of file Evaluations.php */
/* Location: ./application/models/Evaluations.php */