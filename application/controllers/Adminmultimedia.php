<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmultimedia extends CI_Controller {

	private $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata('user');
	}
	public function index()
	{
		$this->utils->layouts('adminmultimedia/index');
	}

	public function gallery()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$data['images'] = $this->multimedia->get(['user_id' => $this->user->user_id]);
		if (empty($data['images'])) {
			$data['danger'] = 'No existen aun imagenes.';
		}
		echo json_encode($data);
	}

	public function upload_img()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 100;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')){
		$data['danger'] = $this->upload->display_errors();
		}
		else{
		$values = [
			'user_id' => $this->user->user_id,
			'file_name' => $this->upload->data('raw_name'),
			'file_type' => $this->upload->data('file_ext')
		];
		$this->multimedia->insert($values);
		$data['success'] = 'Se subio correctamente la imagen.';
		}
		echo json_encode($data);
	}

	public function delete()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('multimedia_id', 'Registro multimedia', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->multimedia->get(['multimedia_id' => $this->input->post('multimedia_id', TRUE), 'user_id' => $this->user->user_id], 1);
			if (!empty($exist)) {
				$this->multimedia->delete(['multimedia_id' => $this->input->post('multimedia_id', TRUE)]);
				unlink('./assets/img/'.$exist->file_name.$exist->file_type);
				$data['success'] = 'Se elimino la imagen';
			}else{
				$data['danger'] = 'No existe la imagen';
			}
		} else {
			$data['danger'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}
}

/* End of file Adminmultimedia.php */
/* Location: ./application/controllers/Adminmultimedia.php */