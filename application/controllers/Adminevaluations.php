<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEvaluations extends CI_Controller {

	public function index()
	{
		/*show all evaluations with answers of the user lesson*/
		$this->utils->layouts('adminevaluations/index');
		$this->load->view('adminevaluations/createevaluation');
		$this->load->view('adminevaluations/createanswer');
		$this->load->view('adminevaluations/editanswer');
		$this->load->view('adminevaluations/editevaluation');
	}

	public function proCreate()
	{
		/*process to create evaluation with answer*/
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