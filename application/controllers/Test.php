<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->custom->layouts('test');
	}

	public function ajax_alert()
	{
		$this->form_validation->set_rules('email', 'Correo electronico', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			/*assign variable to post data*/
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password', TRUE);
			if($email == 'correo@correo.com' && $password == 'password'){
				$title = 'Super!';
				$msg = 'Si existe en la base de datos';
				$bColor = 'alert-success';
			}else{
				$title = 'No esta super!';
				$msg = 'No existe en la base de datos';
				$bColor = 'alert-danger';
			}
		} else {
			$title = 'Ño!';
			$msg = validation_errors('<br>');
			$bColor = 'alert-danger';
		}
		$this->custom->alert($title, $msg, $bColor);
	}

	public function ajax_panel()
	{
		$this->form_validation->set_rules('idElement', 'id', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$idElement = $this->input->post('idElement', true);
			$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt illo dolorem asperiores perspiciatis veritatis tempora in rerum quo! Amet pariatur, eaque voluptates quidem minima quas vero rem. Doloremque doloribus, hic?';
			$queryResult = [
							['idCourse' => '0','nombreCurso'=> 'Web 2', 'description' => $lorem, 'status' => 'activo'],
							['idCourse' => '1','nombreCurso'=> 'Web 2', 'description' => $lorem, 'status' => 'inactivo']
						];
			$panelElements = ['nombreCurso', 'description', 'status'];
			if (!empty($queryResult)) {
				$queryId = 'idCourse';
				$functions = ['Mostrar' => 'btn-primary', 'Eliminar' => 'btn-danger'];	
				$this->custom->card($idElement, $queryResult, $queryId, $panelElements, $functions);
			}else{
				$title = 'Ño!';
				$msg = 'No existen registros';
				$bColor = 'alert-danger';
				$this->custom->alert($title, $msg, $bColor);
			}
		} else {
			$title = 'Ño!';
			$msg = validation_errors('<br>');
			$bColor = 'alert-danger';
			$this->custom->alert($title, $msg, $bColor);
		}
		
	}

	public function ajax_modal()
	{
		
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */