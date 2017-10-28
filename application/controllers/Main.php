<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->custom->layouts('main/index');
	}

	public function up()
	{
		$this->load->library('migration');
		if ($this->migration->version(13) === FALSE)
			{
            	show_error($this->migration->error_string());
            }
	}

	public function down()
	{
		$this->load->library('migration');
		if ($this->migration->version(0) === FALSE)
			{
            	show_error($this->migration->error_string());
            }
	}
	public function register()
	{
		$this->custom->layouts('main/register');
	}

	public function regUser()
	{
		$this->form_validation->set_rules('firstName', 'Nombre(s)', 'trim|required');
		$this->form_validation->set_rules('lastName', 'Apellido paterno', 'trim|required');
		$this->form_validation->set_rules('lastMotherName', 'Apellido materno', 'trim|required');
		$this->form_validation->set_rules('userEmail', 'Correo electrónico', 'trim|required|is_unique[users.user_email]');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
		if ($this->form_validation->run() == TRUE) {
			$values=[
				'user_email' => $this->input->post('userEmail', TRUE),
				'first_name' => $this->input->post('firstName', TRUE),
				'last_name' => $this->input->post('lastName', TRUE),
				'last_mother_name' => $this->input->post('lastMotherName', TRUE),
				'user_email' => $this->input->post('userEmail', TRUE),
				'password' => $this->encryption->encrypt($this->input->post('password', TRUE)),
				'authentication_code' => random_string('alnum', 16),
				'status_id' => 'user0'
			];
			/*$this->users->insert($values);
			$this->custom->sendEmail($emailDestiny, $subject, $message);
			*/
			$title = '<i class="fa fa-thumb-up"></i>YesOfCourse';
			$msg = 'Se ha enviado un mensaje a su correo electrónico para continuar con su registro.';
			$bColor = 'alert-success';
			$this->custom->alert($title, $msg, $bColor);
		} else {
			$title = '<i class="fa fa-thumb-down"></i>YesOfCourse';
			$msg = validation_errors('<br>');
			$bColor = 'alert-danger';
			$this->custom->alert($title, $msg, $bColor);
		}
	}

	public function validate($user_id = '', $code = '')
	{
		$this->custom->layouts('main/validate_user');
	}

	public function login()
	{
		$this->custom->layouts('main/login');
	}

	public function reset_password($user_id = '', $code = '')
	{
		$this->custom->layouts('main/reset_password');
	}

	public function change_password($user_id = '', $reset_code = '')
	{
		$this->custom->layouts('main/change_password');
	}

	public function search()
	{
		$this->custom->layouts('main/search');
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */