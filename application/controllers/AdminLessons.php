<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLessons extends CI_Controller {

	public function index()
	{
		/*show all lessons own of the user course*/
		$this->custom->layouts('adminlessons/index');
	}

	public function create()
	{
		/*view create lesson*/
		$this->custom->layouts('adminlessons/create');
	}

	public function proCreate()
	{
		/*process to create lesson*/
	}
	public function edit($lesson_id)
	{
		/*view modify lesson*/
		$this->custom->layouts('adminlessons/edit');
	}

	public function proEdit()
	{
		/*process to modify lesson*/
	}

	public function proDelete()
	{
		
	}
	
}

/* End of file AdminLessons.php */
/* Location: ./application/controllers/AdminLessons.php */	