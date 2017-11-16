<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Init_application extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		/*initial status and unmodify*/
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("usr00", "Administrador")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("usr01", "Usuario inactivo")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("usr02", "Usuario activo")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("usr04", "Usuario bloqueado")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("crs00", "Curso activo")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("crs01", "Curso inactivo")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("crs02", "Curso suspendido")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("ins00", "Inscripción inactiva")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("ins01", "Inscripción activa")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("ans00", "Respuesta correcta")');
		$this->db->query('INSERT INTO status(status_id, status_description) VALUES("ans01", "Respuesta incorrecta")');
		/*initial and example categories*/
		$this->db->query('INSERT INTO categories(category_description) VALUES("Informatica")');
		$this->db->query('INSERT INTO categories(category_description) VALUES("Administración")');
		$this->db->query('INSERT INTO categories(category_description) VALUES("Contabilidad")');
		$this->db->query('INSERT INTO categories(category_description) VALUES("Medicina")');
		$this->db->query('INSERT INTO categories(category_description) VALUES("Agricola")');
	}

	public function down() {
		$this->db->query('DELETE FROM status');
		$this->db->query('DELETE FROM categories');
	}

}

/* End of file 013_init_application.php */
/* Location: ./application.php */