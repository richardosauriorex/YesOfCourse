<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answers extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('answers', $value);
	}

	/*into value = array associative with fields and answer_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('answer_id', $id);
		return $this->db->update('answers', $values);
	}

	/*into answer_id, return a row with all fields from answers*/
	public function get($id = '')
	{
		$this->db->where('answer_id', $id);
		$result = $this->db->get('answers');
		return $result->row();
	}

	/*into evaluation_id , return select * from answers where evaluation_id = evaluation_id */
	public function get_evaluation_answers($id = '')
	{
		$this->db->where('evaluation_id', $id);
		$result = $this->db->get('answers');
		return $result->result();
	}

	public function delete($id ='')
	{
		$this->db->where('answer_id', $id);
		$this->db->limit(1);
		return $this->db->delete('answers');
	}

}

/* End of file Answers.php */
/* Location: ./application/models/Answers.php */