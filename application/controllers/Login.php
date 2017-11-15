<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		/*view login*/
		$this->utils->layouts('main/login');
	}
	
	public function proLogin()
	{
		/*process to login*/
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('user_email', 'Correo Electrónico', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]|max_length[30]');
		if ($this->form_validation->run() == TRUE) {
			$user_email = $this->input->post('user_email', TRUE);
			$password = $this->input->post('password', TRUE);
			$res = $this->users->get(['user_email' => $user_email],1);
			if (!empty($res)) {
				if ($password == $this->encryption->decrypt($res->password)) {
					/*$this->session->set_userdata('user', $res);*/
					$data['success'] = 'Bienvenid@ '.$res->first_name.' '.$res->last_name.' '.$res->last_mother_name;
					$data['url'] = site_url().'/user/index';
				}
				
			}else{
				$data['danger'] = 'El Correo Electrónico/Contraseña son erroneos. Verifiquelo';
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */