<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

	private $user;

	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('user');
	}
	public function index()
	{
		$data = [
			'inscriptions' => $this->inscriptions->get(['user_id' => $this->user->user_id,'status_id'=> 'ins01'])
		];
		/*show list inscription of the user*/
		$this->utils->layouts('inscription/index', $data);
	}
	
	public function proInscription()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('courseId', 'Numero de registro curso', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$course_id = $this->input->post('courseId', TRUE);
			if ($this->session->has_userdata('user')) {
			/*if exist a inscription in this course for this user don't insert*/
			$existIns=$this->inscriptions->get(['user_id' => $this->user->user_id, 'course_id'=> $course_id],1);
			if (empty($existIns )) {
				$values = [
				'aprobed_lessons' => $this->results->count(['qualification >=' => '8']),
				'reprobed_lessons' => $this->results->count(['qualification <=' => '8']),
				'course_id' => $course_id,
				'user_id' => $this->user->user_id,
				'status_id' => 'ins01'
 			];
			$this->inscriptions->insert($values);	
			}
			$data['success'] = 'Se inscribio al curso. Disfrutelo';
			}
		}
		echo json_encode($data);
	}

	public function proDelete()
	{
		/*process to delete inscription*/
	}

	public function course($id_inscription = '' ,$id_course = '')
	{
		$data = [
			'inscription_id' => $id_inscription,
			'course' => $this->courses->get(['course_id' => $id_course,'status_id'=> 'crs00'],1),
			'lessons' => $this->lessons->get(['course_id' => $id_course])
		];
		if (empty($data['course'])) {
			redirect('inscription/','refresh');
		}
		/*show list inscription of the user*/
		$this->utils->layouts('inscription/course', $data);
	}

	public function lesson($id_inscription = '' ,$id_course = '', $id_lesson = '')
	{
		$data = [
			'inscription_id' => $id_inscription,
			'course_id' => $id_course,
			'lesson_id' => $id_lesson,
			'lesson' => $this->lessons->get(['lesson_id' => $id_lesson, 'course_id' => $id_course], 1)
		];
		if (empty($data['lesson'])) {
			redirect('inscription/','refresh');	
		}
		$this->utils->layouts('inscription/lesson', $data);	
	}

	public function evaluation($id_inscription, $id_course = '', $id_lesson = '')
	{
		$data = [
			'inscription_id' => $id_inscription,
			'course_id' => $id_course,
			'lesson_id' => $id_lesson,
			'evaluations' => $this->evaluations->get(['lesson_id' => $id_lesson])
		];
		if (empty($data['evaluations'])) {
			redirect('inscription/lesson/'.$id_inscription.'/'.$id_course.'/'.$id_lesson,'refresh');
		}
		$this->utils->layouts('inscription/evaluation', $data);	
		
	}

	public function result()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('inscription_id', 'Numero de inscripción', 'trim|required');
		$this->form_validation->set_rules('lesson_id', 'Numero registro lección', 'trim|required');
		$this->form_validation->set_rules('number_questions', 'Numero de preguntas', 'trim|required');
		$this->form_validation->set_rules('good_answers', 'Respuestas correctas', 'trim|required');
		$this->form_validation->set_rules('qualification', 'Calificación', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->results->get(['inscription_id' => $this->input->post('inscription_id', TRUE), 'lesson_id' => $this->input->post('lesson_id', TRUE)]);
			if (empty($exist)) {
				$values = [
				'number_questions' => $this->input->post('number_questions', TRUE),
				'good_answers' => $this->input->post('good_answers', TRUE),
				'qualification' => $this->input->post('qualification', TRUE),
				'inscription_id' => $this->input->post('inscription_id', TRUE),
				'lesson_id' => $this->input->post('lesson_id', TRUE)
			];
			$this->results->insert($values);
			$data['success'] = 'Se registro la calificación.';
			}else{
			$data['danger'] = 'La lección ya ha sido aprobada';
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

}

/* End of file Inscription.php */
/* Location: ./application/controllers/Inscription.php */