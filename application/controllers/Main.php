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
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */