<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('lessons', $value);
	}

	/*into value = array associative with fields and lesson_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('lesson_id', $id);
		return $this->db->update('lessons', $values);
	}

	/*into lesson_id, return a row with all fields from lessons*/
	public function get($id = '')
	{
		$this->db->where('lesson_id', $id);
		$result = $this->db->get('lessons');
		return $result->row();
	}

	/*into course_id , return select * from lessons where course_id = course_id */
	public function get_course_lessons($id_course = '')
	{
		$this->db->where('course_id', $id_course);
		$result = $this->db->get('lessons');
		return $result->result();
	}

	public function delete($lesson_id ='')
	{
		$this->db->where('lesson_id', $id);
		return $this->db->delete('lessons');
	}
	

}

/* End of file Lessons.php */
/* Location: ./application/models/Lessons.php */