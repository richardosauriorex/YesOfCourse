<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->custom->layouts('main/index');
	}

	public function search()
	{
		/*search view*/
		$this->custom->layouts('main/search');
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

	public function down()
	{
		$this->load->library('migration');
		if ($this->migration->version(0) === FALSE)
			{
            	show_error($this->migration->error_string());
            }
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */