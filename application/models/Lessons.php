<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Model {
private $table = 'lessons';
	/*into value = array associative with fields to insert return true or false*/
	public function insert($value = '')
	{
		return $this->db->insert($this->table, $value);
	}

	/*into value = array associative with fields and id to table return true or false*/
	public function update($where = '', $set = '')
	{
		$this->db->where($where);
		$this->db->limit(1);
		return $this->db->update($this->table, $set);
	}

	/*into $where = [field => value ] and $limit = number and order by $order_by = field $direction = asc or desc to return result*/
	public function get($where = '', $limit = '', $order_by = '',  $direction = '')
	{
		if ($where != '') {
			$this->db->where($where);	
		}
		if ($order_by != '' && $direction != '') {
			$this->db->order_by($order_by, $direction);
		}
		if ($limit != '') {
			if ($limit == 1) {
				$this->db->limit($limit);
				$result = $this->db->get($this->table);
				return $result->row();		
			}else{
				$this->db->limit($limit);
				$result = $this->db->get($this->table);
				return $result->result();
			}
		}
		$result = $this->db->get($this->table);
		return $result->result();
	}

	/*into $where = [field => value] to delete record*/
	public function delete($where = '')
	{
		$this->db->where($where);
		$this->db->limit(1);
		return $this->db->delete($this->table);
	}

	public function count($where = '')
	{
		$this->db->where($where);
		return $this->db->count_all_results($this->table);
	}

	public function join_eval_ans($lesson_id = '')
	{
		$this->db->where('lessons.lesson_id', $lesson_id);
		$this->db->join('evaluations', 'evaluations.lesson_id = lessons.lesson_id');
		$this->db->join('answers', 'answers.evaluation_id = evaluations.evaluation_id');
		$result = $this->db->get('lessons');
		return $result;
	}
}

/* End of file Lessons.php */
/* Location: ./application/models/Lessons.php */