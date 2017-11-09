<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
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
				'status_id' => 'usr01'
			];
			$this->users->insert($values);
			$id = $this->users->get(['user_email' => $values['user_email']]);
			$subject = 'Bienvenid@ a YesOfCourse';
			$message = 'Para activar su cuenta de click en el siguiente enlace:<br><a style="text-decoration:none;"href="'.site_url().'/register/validate/'.$id['user_id'].'/'.$values['aupthentication_code'].'">Activar cuenta</a>';
			$this->custom->sendEmail($values['user_email'], $subject, $message);
			$title = 'Bienvenido';
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
		$res = $this->users->get(['user_id' => $user_id, 'authentication_code' => $code]);
		if (!empty($res)) {
		$this->users->update($user_id, ['status_id' => 'usr02']);
		$this->load->view('main/_activated');	
		}else{
		$this->load->view('main/_noactivated');	
		}
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */