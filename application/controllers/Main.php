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
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash(); 
		/*process to search course*/
		$this->form_validation->set_rules('search', 'Busqueda', 'trim|required|max_length[250]');
		if ($this->form_validation->run() == TRUE) {
			$search = $this->input->post('search', TRUE);
			if ($search == 'all') {
				/*send all courses*/
				$result = $this->courses->get(['status_id' => 'crs00']);
				if (!empty($result)) {
					$data['results'] = $result; 	
				}	
			} else {
				/*send all courses that's same of the search*/
				$result = $this->courses->like(['course_name' => $search],['status_id' => 'crs02', 'status_id' => 'crs01']);
				$data['quees'] = $result;
				if (!empty($result)) {
					$data['results'] = $result;	
				}
			}
		}
		if ($this->session->has_userdata('user')) {
			$data['userStatus'] = 'logged';
		}
		echo json_encode($data);
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */