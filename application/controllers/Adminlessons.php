<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLessons extends CI_Controller {

	private $user;

	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('user');
	}

	public function index($course_id = '')
	{
		$data =
		[
			'course' => $this->courses->get(['course_id' => $course_id] , 1),
			'lessons' => $this->lessons->get(['course_id' => $course_id])
		];
		/*show all lessons own of the user course*/
		$this->utils->layouts('adminlessons/index', $data);
	}

	public function create($course_id = '')
	{
		/*view create lesson*/
		$data = 
		[
			'course_id' => $course_id
		];
		$this->utils->layouts('adminlessons/create', $data);
	}

	public function proCreate()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		/*process to create lesson*/
		$this->form_validation->set_rules('course_id', 'Numero de registro curso', 'trim|required');
		$this->form_validation->set_rules('lesson_title', 'Titulo de la lección', 'trim|required|min_length[10]|max_length[255]');
		$this->form_validation->set_rules('lesson_description', 'Descripción de la lección', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$values = [
				'course_id' => $this->input->post('course_id', TRUE),
				'lesson_title' => $this->input->post('lesson_title', TRUE),
				'lesson_description' => $this->input->post('lesson_description', TRUE)
			];
			$this->lessons->insert($values);
			$data['success'] = 'Se registro la lección.';
			$data['url'] = site_url().'/adminlessons/index';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}
	public function edit($course_id = '', $lesson_id = '')
	{
		$data = [
			'lesson' => $this->lessons->get(['course_id'=> $course_id, 'lesson_id' => $lesson_id],1),
		];
		/*view modify lesson*/
		$this->utils->layouts('adminlessons/edit',$data);
	}

	public function proEdit()
	{
		/*process to modify lesson*/
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		/*process to create lesson*/
		$this->form_validation->set_rules('course_id', 'Numero de registro curso', 'trim|required');
		$this->form_validation->set_rules('lesson_id', 'Numero registro lección', 'trim|required');
		$this->form_validation->set_rules('lesson_title', 'Titulo de la lección', 'trim|required|min_length[10]|max_length[255]');
		$this->form_validation->set_rules('lesson_description', 'Descripción de la lección', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$set = [
				'lesson_title' => $this->input->post('lesson_title', TRUE),
				'lesson_description' => $this->input->post('lesson_description', TRUE)
			];
			$where = [
				'course_id' => $this->input->post('course_id', TRUE),
				'lesson_id' => $this->input->post('lesson_id', TRUE),
			];
			$this->lessons->update($where, $set);
			$data['info'] = 'Se modifico la lección.';
			$data['url'] = site_url().'/adminlessons/index';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proDelete()
	{
		
	}
	
}

/* End of file AdminLessons.php */
/* Location: ./application/controllers/AdminLessons.php */	