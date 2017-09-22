<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_status extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
		'status_id' => array(
	        'type' => 'INT',
			'unsigned' => TRUE,
			'auto_increment' => TRUE
		),
		'status_description' => array(
			'type' => 'VARCHAR',
			'constraint' => '255',
			'null' => FALSE
		)
	));
	$this->dbforge->add_key('status_id', TRUE);
	$this->dbforge->create_table('status');
	$this->db->query('ALTER TABLE users ADD FOREIGN KEY (status_id) REFERENCES status(status_id)');
	}

	public function down() {
		$this->db->query('ALTER TABLE users DROP FOREIGN KEY users_ibfk_1');
		$this->dbforge->drop_table('status');
	}

}

/* End of file 002_create_status.php */
/* Location: ./application/migrations/002_create_status.php */