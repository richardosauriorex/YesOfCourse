<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Model {

	/*into value = array associative with fields to insert*/
	public function insert($value = '')
	{
		return $this->db->insert('courses', $value);
	}

	/*into value = array associative with fields and course_id return true or false*/
	public function update($value = '', $id = '')
	{
		$this->db->where('course_id', $id);
		return $this->db->update('courses', $values);
	}

	/*into user_id, return a row with all fields from course*/
	public function get($id = '')
	{
		$this->db->where('course_id', $id);
		$result = $this->db->get('courses');
		return $result->row();
	}

	/*return select * from courses where user_id = $id*/
	public function get_all_user()
	{
		$this->db->where('user_id', $id);
		$result = $this->db->get('courses');
		return $result->result();
	}

	/*return select * from courses*/
	public function get_all($search = '', $category = '')
	{
		if (!empty($category)) {
			$this->db->join('categories', 'courses.category_id = categories.category_id');
			$this->db->where('category_description', $category);
		}
		if (!empty($search)) {
			$this->db->like('course_name', $search);
			$this->db->or_like('description', $search);
		}
		$result = $this->db->get('courses');
		return $result->result();
	}

}

/* End of file Courses.php */
/* Location: ./application/models/Courses.php */