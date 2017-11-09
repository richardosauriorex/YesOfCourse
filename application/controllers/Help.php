<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index($user_id = '', $code = '')
	{
		$this->custom->layouts('main/help');
	}

	public function helpMe()
	{
		$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
		$this->form_validation->set_rules('opt', 'Opción', 'trim|required|in_list[code_auth,rest_pass]');
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email', TRUE);
			$opt = $this->input->post('opt', TRUE);
			$user = $this->users->get(['user_email' => $email]);
			if (!empty($user)) {
				if ($opt == 'code_auth') {
					$subject = 'Bienvenid@ a YesOfCourse';
					$message = 'Para activar su cuenta de click en el siguiente enlace:<br><a style="text-decoration:none;"href="'.site_url().'/register/validate/'.$user->user_id.'/'.$user->authentication_code.'">Activar cuenta</a>';	
					$this->custom->sendEmail($email, $subject, $message);
				}else if($opt == 'rest_pass'){
					$reset_code = random_string('alnum', 16);
					$value = ['user_id' => $user->user_id, 'reset_code' => $reset_code];
					$this->reset_password->insert($value);
					$subject = 'Bienvenid@ a YesOfCourse';
					$message = 'Para restaurar su contraseña de click en el siguiente enlace:<br><a style="text-decoration:none;"href="'.site_url().'/help/change_password/'.$user->user_id.'/'.$reset_code.'">Restaurar contraseña</a>';	
					$this->custom->sendEmail($email, $subject, $message);
				}
				$title = '<i class="fa fa-thumb-down"></i>YesOfCourse';
				$msg = 'Revise su correo electrónico para continuar con el proceso.';
				$bColor = 'alert-success';
				$this->custom->alert($title, $msg, $bColor);
			}else{
				$title = '<i class="fa fa-thumb-down"></i>YesOfCourse';
				$msg = 'Su correo electrónico no esta registrado, favor de verificarlo.';
				$bColor = 'alert-danger';
				$this->custom->alert($title, $msg, $bColor);
			}
		} else {
			$title = '<i class="fa fa-thumb-down"></i>YesOfCourse';
			$msg = validation_errors('<br>');
			$bColor = 'alert-danger';
			$this->custom->alert($title, $msg, $bColor);
		}
	}

	public function change_password($user_id = '', $reset_code = '')
	{
		$this->custom->layouts('main/change_password');
	}

	public function proChangePass()
	{
		
	}

}

/* End of file Help.php */
/* Location: ./application/controllers/Help.php */