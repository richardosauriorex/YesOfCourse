<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils
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

	public function mailResetPass($email = '', $user_id = '')
	{
		$value = ['user_id' => $user_id, 'reset_code' => random_string('alnum', 16)];
		$this->reset_password->insert($value);
		$subject = 'Bienvenid@ a YesOfCourse';
		$message = 'Para restaurar su contraseña de click en el siguiente enlace:<br><a style="text-decoration:none;"href="'.site_url().'/help/change_password/'.$value['user_id'].'/'.$value['reset_code'].'">Restaurar contraseña</a>';
		$this->sendEmail($email, $subject, $message);
	}

	public function sendCodeAut($email, $id, $code)
	{
		$subject = 'Bienvenid@ a YesOfCourse';
		$message = 'Para activar su cuenta de click en el siguiente enlace:<br><a style="text-decoration:none;"href="'.site_url().'/register/validate/'.$id.'/'.$code.'">Activar cuenta</a>';
		$this->sendEmail($email, $subject, $message);
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