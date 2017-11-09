<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		/*show view perfil with options*/
		$this->custom->layouts('user/index');
	}

	public function edit($user_id = '')
	{
		/*show form modify user information*/
		$this->custom->layouts('user/edit');
	}

	public function proEdit()
	{
		/*process to modify user info*/	
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */