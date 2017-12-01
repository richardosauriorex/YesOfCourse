<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrationdb extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');
		if ($this->migration->version(13) === FALSE)
			{
            	show_error($this->migration->error_string());
            }
        redirect(site_url(),'refresh');
			
	}

}

/* End of file Database.php */
/* Location: ./application/controllers/Database.php */