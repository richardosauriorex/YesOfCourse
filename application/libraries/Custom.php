<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom
{
	protected $ext;

	function __construct()
	{
		$this->ext =& get_instance();
	}

	public function layouts($view = '', $data = '')
	{
		$this->ext->load->view('layouts/_header.php');
		$this->ext->load->view($view, $data);
		$this->ext->load->view('layouts/_footer.php');
	}
}
?>