<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

	public function list()
	{
		/*show list inscription of the user*/
		$this->utils->layouts('inscription/index');
	}
	
	public function proCreate()
	{
		/*process to create inscription to course*/
	}

	public function proDelete()
	{
		/*process to delete inscription*/
	}

	public function course($course_id = '')
	{
		/*show list lessons of the course*/
		$this->utils->layouts('inscription/course');
	}

	public function lesson($lesson_id = '')
	{
		/*show result of lesson and buttons to show lesson and realize evaluation*/
		$this->utils->layouts('inscription/lesson');
	}

	public function evaluation($lesson_id = '')
	{
		/*show the evaluation of the lesson*/
		$this->utils->layouts('evaluation/index');
	}

	public function proEvaluation($value='')
	{
		/*process to evaluation*/
	}

}

/* End of file Inscription.php */
/* Location: ./application/controllers/Inscription.php */