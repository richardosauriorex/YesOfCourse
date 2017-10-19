<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->custom->layouts('main/index');
	}

	public function register()
	{
		$this->custom->layouts('main/register');
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

	public function test()
	{
		if($this->input->is_ajax_request()){
			$data = [];
			$data['hash'] = $this->security->get_csrf_hash();
			$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->input->post('email') == 'hola@hola.com') {
					$data['msg'] = 'Existe en la base de datos';
					$data['color'] = 'alert-success';	
				}else{
					$data['msg'] = 'No existe en la base de datos';
					$data['color'] = 'alert-danger';
				}
			} else {
				$data['msg'] = validation_errors();
				$data['color'] = 'alert-danger';
			}
			echo json_encode($data);
		}
		
	}

	

	

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */