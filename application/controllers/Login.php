<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		/*view login*/
		$this->custom->layouts('main/login');
	}
	
	public function proLogin()
	{
		/*process to login*/
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */