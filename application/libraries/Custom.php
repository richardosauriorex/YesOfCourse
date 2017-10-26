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
		$this->ext->load->view('layouts/_alerts.php');
		$this->ext->load->view($view, $data);
		$this->ext->load->view('layouts/_footer.php');
	}

	public function alert($title = '', $msg = '', $bColor = '')
	{
		$data = [];
		$data['type'] = 'alert';
		$data['csrf'] = $this->ext->security->get_csrf_hash();
		$data['title'] = $title;
		$data['msg'] = $msg;
		$data['bColor'] = $bColor;
		echo json_encode($data);
	}

	public function card($idElement = '', $queryResult = '', $queryId = '', $panelElements = '', $functions = '')
	{
		$data = [];
		$data['type'] = 'card';
		$data['csrf'] = $this->ext->security->get_csrf_hash();
		$data['idElement'] = $idElement; /*name of the div to contain*/
		$data['queryResult'] = $queryResult; /*is assoc array*/
		$data['queryId'] = $queryId; /*string with the name of the id table*/
		$data['panelElements'] = $panelElements; /*is a array example ['title', 'description', 'status']*/
		$data['functions'] = $functions; /*is assoc array example ['Mostrar' => 'btn-primary']*/
		echo json_encode($data);
	}

	public function modal()
	{
		$data = [];
		$data['type'] = 'table';
		$data['csrf'] = $this->ext->security->get_csrf_hash();
		$data['queryResult'] = $queryResult; /*is a assoc array*/
		$data['fieldNames'] = $fieldNames; /*is a array with the id input to fill*/
		echo json_encode($data);
	}
}
?>