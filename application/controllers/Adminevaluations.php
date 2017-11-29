<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEvaluations extends CI_Controller {

	public function index($course_id = '', $lesson_id = '')
	{
		$data =
		[
			'lesson' => $this->lessons->get(['lesson_id' => $lesson_id], 1),
			'evaluations' => $this->evaluations->get(['lesson_id' => $lesson_id]),
			'course_id' => $course_id

		];
		/*show all evaluations with answers of the user lesson*/
		$this->utils->layouts('adminevaluations/index', $data);
		$this->load->view('adminevaluations/createevaluation');
		$this->load->view('adminevaluations/createanswer');
		$this->load->view('adminevaluations/editanswer');
		$this->load->view('adminevaluations/editevaluation');
	}

	public function proCreate()
	{
		/*process to create evaluation with answer*/
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('question', 'Pregunta', 'trim|required');
		$this->form_validation->set_rules('answer', 'Respuesta', 'trim|required');
		$this->form_validation->set_rules('lesson_id', 'Numero de registro lección', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->lessons->get(['lesson_id' => $this->input->post('lesson_id', TRUE)], 1);
			if (!empty($exist)) {
				$values = [
					'lesson_id' => $this->input->post('lesson_id', TRUE),
					'question' => $this->input->post('question', TRUE)
				];
				$id = $this->evaluations->insert($values);
				$values = [
					'evaluation_id' => $id,
					'answer' => $this->input->post('answer', TRUE),
					'status_id'=> 'ans00'
				];
				$this->answers->insert($values);
				$data['success'] = 'Se registró la evaluación';
			}else{
				$data['danger'] = 'La lección no es válida';	
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEdit()
	{
		/*process to modify evaluation*/
	}

	public function proAnswer()
	{
		/*process to create answer*/
	}

	public function proEditAnswer()
	{
		/*process to modify answer*/
	}

	public function deleteEvaluation()
	{
		
	}
	public function deleteAnswer()
	{
		
	}

}

/* End of file AdminEvaluations.php */
/* Location: ./application/controllers/AdminEvaluations.php */