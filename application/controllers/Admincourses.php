<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincourses extends CI_Controller {

	private $status_list;
	private $categories_list;
	private $user;

	public function __construct()
	{
		parent::__construct();
		$this->status_list = $this->status->like(['status_id' => 'crs'], ['status_id' => 'crs02']);
		$this->categories_list = $this->categories->get();
		$this->user = $this->session->userdata('user');
	}

	public function index()
	{
		/*show all courses own of the user*/
		$this->utils->layouts('admincourses/index');
		
	}

	public function create()
	{
		$data = [
			'status' => $this->status_list,
			'categories' => $this->categories_list
		];
		/*view create course*/
		$this->utils->layouts('admincourses/create', $data);
	}

	public function proCreate()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash(); 
		/*process create course*/
		$this->form_validation->set_rules('course_name', 'Nombre del curso', 'trim|required|min_length[10]|max_length[255]');
		$this->form_validation->set_rules('description', 'Descripción', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Categoria', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Estado del curso', 'trim|required|in_list[crs00,crs01]');
		if ($this->form_validation->run() == TRUE) {
			$values =[
				'course_name' => $this->input->post('course_name', TRUE),
				'description' => $this->input->post('description', TRUE),
				'category_id' => $this->input->post('category_id', TRUE),
				'status_id' => $this->input->post('status_id', TRUE),
				'user_id' => $this->user->user_id
			];
			$this->courses->insert($values);
			$data['success'] = 'Se registro el curso.';
			$data['url'] = site_url().'/admincourses/index';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function edit($course_id = '')
	{
		$data = [
			'course' => $this->courses->get(['course_id' => $course_id, 'user_id' => $this->user->user_id],1),
			'status' => $this->status_list,
			'categories' => $this->categories_list
		];
		/*view edit course*/
		$this->utils->layouts('admincourses/edit', $data);
	}

	public function proEdit()
	{
		/*process edit course*/
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash(); 
		/*process create course*/
		$this->form_validation->set_rules('course_id', 'Numero de curso', 'trim|required');
		$this->form_validation->set_rules('course_name', 'Nombre del curso', 'trim|required|min_length[10]|max_length[255]');
		$this->form_validation->set_rules('description', 'Descripción', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Categoria', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Estado del curso', 'trim|required|in_list[crs00,crs01]');
		if ($this->form_validation->run() == TRUE) {
			$set =[
				'course_name' => $this->input->post('course_name', TRUE),
				'description' => $this->input->post('description', TRUE),
				'category_id' => $this->input->post('category_id', TRUE),
				'status_id' => $this->input->post('status_id', TRUE),
				'user_id' => $this->user->user_id
			];
			$where = [
				'user_id' => $this->user->user_id,
				'course_id' => $this->input->post('course_id', TRUE)
			];
			$this->course->update($where, $set);
			$data['info'] = 'Se modifico el curso.';
			$data['url'] = site_url().'/admincourses/index';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proDelete()
	{
		
	}

}

/* End of file AdminCourses.php */
/* Location: ./application/controllers/AdminCourses.php */