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
		/*show list inscription of the user*/
		$this->utils->layouts('inscription/index');
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

}

/* End of file Inscription.php */
/* Location: ./application/controllers/Inscription.php */