<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_evaluations extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'evaluation_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'question' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
			'lesson_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100'
			),
		));

		$this->dbforge->add_key('evaluation_id', TRUE);
		$this->dbforge->create_table('evaluations');
		$this->db->query('ALTER TABLE evaluations ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE evaluations ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('evaluations');
	}

}

/* End of file 007_create_evaluations.php */
/* Location: ./application/migrations/007_create_evaluations.php */