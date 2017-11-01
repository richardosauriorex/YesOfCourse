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

	public function sendEmail($emailDestiny = '', $subject = '', $message = '')
	{
            $txt = 
            '<div style="background-color:#1E8449; border:1px solid #52BE80; margin: 50px 50px; border-radius: 5px; padding: 10px; color: white;font-family: "Indie Flower", cursive;">
			<h3><strong>YesOfCourse:</strong></h3>
			<h3>'.$message.'</h3>
			</div>';
            $config['protocol'] = 'smtp';
            $config['smtp_host']= 'ssl://smtp.gmail.com';
            $config['smtp_port']= 465;
            $config['smtp_user']= 'testsendmail182@gmail.com'; /*this email is for test and may be changed*/
            $config['smtp_pass']= 'testsendmail1820';
            $config['smtp_timeout'] = 30;
            $config['validate']= TRUE;
            $config['charset']= 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $config['newline']= "\r\n";
			$this->ext->load->library('email', $config);
			$this->ext->email->from('testsendmail182@gmail.com','YesOfCourse');
			$this->ext->email->to($emailDestiny); /*email destinatary*/
			$this->ext->email->subject($subject); /*subject to mail*/
			$this->ext->email->message($txt); /*this may be a html code*/
			$this->ext->email->send();	
	}
}
?>