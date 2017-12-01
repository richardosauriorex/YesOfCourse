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
		$this->form_validation->set_rules('evaluation_id', 'Numero Registro Evaluación', 'trim|required');
		$this->form_validation->set_rules('question', 'Pregunta', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->evaluations->get(['evaluation_id' => $this->input->post('evaluation_id', TRUE)], 1);
			if (!empty($exist)) {
				$set = ['question' => $this->input->post('question', TRUE)];
				$id = $this->evaluations->update(['evaluation_id' => $this->input->post('evaluation_id', TRUE)], $set);
				$data['info'] = 'Se edito la evaluación';
			}else{
				$data['danger'] = 'La evaluación no es válida';	
			}
		} else {
			$data['danger'] = validation_errors('<br>');	
		}
		echo json_encode($data);
	}

	public function proAnswer()
	{
		/*process to create answer*/
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('evaluation_id', 'Numero de registro evaluación', 'trim|required');
		$this->form_validation->set_rules('answer', 'Respuesta', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Numero de registro estado', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->evaluations->get(['evaluation_id' => $this->input->post('evaluation_id', TRUE)], 1);
			if (!empty($exist)) {
				$values = [
					'evaluation_id' => $this->input->post('evaluation_id', TRUE),
					'answer' => $this->input->post('answer', TRUE),
					'status_id' => $this->input->post('status_id', TRUE)
				];
				$this->answers->insert($values);
				$data['success'] = 'Se registró la respuesta.';
			}else{
				$data['danger'] = 'La evaluación no es válida';	
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEditAnswer()
	{
		/*process to modify answer*/
		$this->form_validation->set_rules('answer_id', 'Numero Registro Pregunta', 'trim|required');
		$this->form_validation->set_rules('answer', 'Respuesta', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Status', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->answers->get(['answer_id' => $this->input->post('answer_id', TRUE)], 1);
			if (!empty($exist)) {
				$set = [
					'answer' => $this->input->post('answer', TRUE),
					'status_id' => $this->input->post('status_id', TRUE)
				];
				$id = $this->answers->update(['answer_id' => $this->input->post('answer_id', TRUE)], $set);
				$data['info'] = 'Se edito la respuesta.';
			}else{
				$data['danger'] = 'La evaluación no es válida';	
			}
		} else {
			$data['danger'] = validation_errors('<br>');	
		}
		echo json_encode($data);
	}

	public function deleteEvaluation()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$data['response'] = $this->evaluations->delete(['evaluation_id' => $this->input->post('evaluation_id', TRUE), 'lesson_id' => $this->input->post('lesson_id', TRUE)]);
		$data['success'] = 'Se elimino la evaluación';
		echo json_encode($data);
	}
	public function deleteAnswer()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$data['response'] = $this->answers->delete(['evaluation_id' => $this->input->post('evaluation_id', TRUE), 'answer_id' => $this->input->post('answer_id', TRUE)]);
		$data['success'] = 'Se elimino la evaluación';
		echo json_encode($data);
	}

	public function evalInfo()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$data['eval'] = $this->evaluations->get(['evaluation_id' => $this->input->post('evaluation_id', TRUE)], 1);
		echo json_encode($data);
	}

	public function ansInfo()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$data['ans'] = $this->answers->get(['answer_id' => $this->input->post('answer_id', TRUE)], 1);
		echo json_encode($data);	
	}

}

/* End of file AdminEvaluations.php */
/* Location: ./application/controllers/AdminEvaluations.php */