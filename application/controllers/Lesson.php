<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	public function index($lesson_id = '')
	{
		/*show lessons*/
		$this->utils->layouts('lesson/index');
	}

}

/* End of file Lesson.php */
/* Location: ./application/controllers/Lesson.php */