<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		/*load view with layouts*/
		$this->utils->layouts('main/register');
	}

	public function validPost()
	{
		/*validation post*/
		$this->form_validation->set_rules('firstName', 'Nombre(s)', 'trim|required');
		$this->form_validation->set_rules('lastName', 'Apellido paterno', 'trim|required');
		$this->form_validation->set_rules('lastMotherName', 'Apellido materno', 'trim|required');
		$this->form_validation->set_rules('userEmail', 'Correo electrónico', 'trim|required|is_unique[users.user_email]');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
		if ($this->form_validation->run() == TRUE) {
			return true;
		}else{
			return false;
		}
	}
	public function regUser()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		if ($this->validPost()) {
			/*asign data post to array associative*/
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
			/*Insert values in table users*/
			$this->users->insert($values);
			/*obtain id user*/
			$id = $this->users->get(['user_email' => $values['user_email']], 1);
			/*send email for activated account*/
			$this->utils->sendCodeAut($values['user_email'], $id->user_id, $values['authentication_code']);
			/*asign msg alert*/
			$data['success'] = 'Se ha enviado un mensaje a su correo electrónico para continuar con su registro.';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		/*send for ajax*/
		echo json_encode($data);
	}

	public function validate($user_id = '', $code = '')
	{
		$this->utils->layouts('main/validate_user');
		/*consult exists the user and validate code*/
		$res = $this->users->get(['user_id' => $user_id, 'authentication_code' => $code]);
		if (!empty($res)) {
		$this->users->update(['user_id' => $user_id ], ['status_id' => 'usr02']);
		$this->load->view('main/_activated');	
		}else{
		$this->load->view('main/_noactivated');	
		}
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */