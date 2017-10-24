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

	public function allData($type = '',$queryResult = '', $queryId = '', $tableHead = '', $ignoreFields = '', $functions = '')
	{
		$data['type'] = $type;
		$data['csrf'] = $this->ext->security->get_csrf_hash();
		$data['queryResult'] = $queryResult; /*is a array*/
		$data['queryId'] = $queryId;
		$data['tableHead'] = $tableHead; /*is a array*/
		$data['ignoreFields'] = $ignoreFields;
		$data['functions'] = $functions; /*is a array*/
		echo json_encode($data);
	}

	public function modal()
	{
		$data['type'] = 'table';
		$data['csrf'] = $this->ext->security->get_csrf_hash();
		$data['queryResult'] = $queryResult; /*is a assoc array*/
		$data['fieldNames'] = $fieldNames; /*is a array*/
		echo json_encode($data);
	}
}
?>