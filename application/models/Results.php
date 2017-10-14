<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('results', $value);
	}

	/*into value = array associative with fields and answer_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('result_id', $id);
		return $this->db->update('results', $values);
	}

	/*into answer_id, return a row with all fields from results*/
	public function get($id = '')
	{
		$this->db->where('result_id', $id);
		$this->db->limit(1);
		$result = $this->db->get('results');
		return $result->row();
	}

	public function delete($id ='')
	{
		$this->db->where('result_id', $id);
		$this->db->limit(1);
		return $this->db->delete('results');
	}

	public function get_lesson_results($inscription_id, $lesson_id)
	{
		$this->db->join('lessons', 'results.result_id = lessons.lesson_id');
		$this->db->where('inscription_id', $inscription_id);
		$this->db->where('lesson_id', $lesson_id);
		$result = $this->db->get('results');
		return $result->result();

	}

}

/* End of file Results.php */
/* Location: ./application/models/Results.php */