<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCourses extends CI_Controller {

	public function index()
	{
		/*show all courses own of the user*/
		$this->utils->layouts('admincourses/index');
	}

	public function create()
	{
		/*view create course*/
		$this->utils->layouts('admincourses/create');
	}

	public function proCreate()
	{
		/*process create course*/	
	}

	public function edit($course_id)
	{
		/*view edit course*/
		$this->utils->layouts('admincourses/edit');
	}

	public function proEdit()
	{
		/*process edit course*/	
	}

	public function proDelete()
	{
		
	}

}

/* End of file AdminCourses.php */
/* Location: ./application/controllers/AdminCourses.php */