<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index($user_id = '', $code = '')
	{
		$this->utils->layouts('main/help');
	}

	public function validPost()
	{
		$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|valid_email');
		$this->form_validation->set_rules('opt', 'Opción', 'trim|required|in_list[code_auth,rest_pass]');
		if ($this->form_validation->run() == TRUE) {
			return true;
		}else{
			return false;
		}
	}
	public function helpMe()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		if ($this->validPost()) {
			$email = $this->input->post('email', TRUE);
			$opt = $this->input->post('opt', TRUE);
			/*query to know if exist user*/
			$user = $this->users->get(['user_email' => $email]);
			if (!empty($user)) {
				/*send email with url for activated account*/
				if ($opt == 'code_auth') {
					$this->utils->sendCodeAut($email, $user->user_id, $user->authentication_code);
					$data['success'] = 'Se ha enviado un correo electrónico para la activación de su cuenta';
				/*send email to reset password*/
				}else if($opt == 'rest_pass'){
					$this->utils->mailResetPass($email, $user->user_id);
					$data['success'] = 'Se ha enviado un correo electrónico para restaurar su contraseña';
				}
			}else{
				$data['danger'] = 'El correo electrónico que ingreso no se encuentra registrado.';
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function change_password($user_id = '', $reset_code = '')
	{
		if($user_id != '' && $reset_code != '') {
			$res = $this->reset_password->get(['user_id'=> $user_id, 'reset_code' => $reset_code], 1);
			if(!empty($res)){
				$data = ['user_id' => $user_id];
				$this->utils->layouts('main/change_password', $data);
			}else{
			redirect(site_url(),'refresh');
			}
		}
	}

	public function proChangePass($user_id = '', $reset_code = '')
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('user_id', 'Numero de registro', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]|max_length[30]');
		if ($this->form_validation->run() == TRUE) {
			$user_id = $this->input->post('user_id', TRUE);
			$password = $this->input->post('password', TRUE);
			$this->reset_password->delete(['user_id'=>$user_id]);
			$this->users->update(['user_id' => $user_id],['password'=> $this->encryption->encrypt($password)]);
			$data['success'] = 'Su contraseña se ha cambiado con exito, ya puede iniciar sesión.';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

}

/* End of file Help.php */
/* Location: ./application/controllers/Help.php */