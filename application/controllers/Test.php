<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->custom->layouts('test');
	}

	public function ajax_alert()
	{
		$this->form_validation->set_rules('email', 'Correo electronico', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			/*assign variable to post data*/
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password', TRUE);
			if($email ==  'correo@correo.com' && $password == 'password'){
				$title = 'Super!';
				$msg = 'Si existe en la base de datos';
				$bColor = 'alert-success';
			}else{
				$title = 'No esta super!';
				$msg = 'No existe en la base de datos';
				$bColor = 'alert-danger';
			}
		} else {
			$title = 'Ño!';
			$msg = validation_errors('<br>');
			$bColor = 'alert-danger';
		}
		$this->custom->alert($title, $msg, $bColor);
	}

	public function ajax_table()
	{
		
	}

	public function ajax_modal()
	{
		
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */