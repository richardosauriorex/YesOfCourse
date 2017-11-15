<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->session->userdata('user');
		/*show view perfil with options*/
		$this->utils->layouts('user/perfil', $data);
	}

	public function proEdit()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$user = $this->session->userdata('user'); 
		/*process to modify user info*/
		$this->form_validation->set_rules('first_name', 'Nombre(s)', 'trim|required|min_length[3]|max_length[150]');
		$this->form_validation->set_rules('last_name', 'Apellido Paterno', 'trim|required|min_length[3]|max_length[150]');
		$this->form_validation->set_rules('last_mother_name', 'Apellido Materno', 'trim|required|min_length[3]|max_length[150]');
		if ($this->form_validation->run() == TRUE) {
			$set = [
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name' => $this->input->post('last_name', TRUE),
				'last_mother_name' => $this->input->post('last_mother_name', TRUE) 
			];
			$this->users->update(['user_id' => $user->user_id], $set);
			$user = $this->users->get(['user_id' => $user->user_id],1);
			$this->session->set_userdata('user', $user);
			$data['info'] = 'Se guardaron los cambios.';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proPass($value='')
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$user = $this->session->userdata('user'); 
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]|max_length[30]');
		if ($this->form_validation->run() == TRUE) {
			$set = ['password' => $this->encryption->encrypt($this->input->post('password', TRUE))];
			$this->users->update(['user_id' => $user->user_id], $set);
			$user = $this->users->get(['user_id' => $user->user_id],1);
			$this->session->set_userdata('user', $user);
			$data['info'] = 'Se guardaron los cambios.';
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function close_session()
	{
		$data=[];
		$this->session->sess_destroy();
		$data['success'] = 'Se cerro la sesión. Hasta la proxima.';
		$data['url'] = site_url();
		echo json_encode($data);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */