<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->utils->layouts('main/index');
	}

	public function search()
	{
		/*search view*/
		$this->utils->layouts('main/search');
	}

	public function proSearch()
	{
		/*process to search course*/
	}
	
	public function up()
	{
		$this->load->library('migration');
		if ($this->migration->version(13) === FALSE)
			{
            	show_error($this->migration->error_string());
            }
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */