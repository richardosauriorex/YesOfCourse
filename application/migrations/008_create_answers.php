<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_answers extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'answer_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'answer' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE
			),
			'evaluation_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100'
			),
			'status_id' => array(
	        'type' => 'VARCHAR',
			'constraint' => '20'
			)
		));
		$this->dbforge->add_key('answer_id', TRUE);
		$this->dbforge->create_table('answers');
		$this->db->query('ALTER TABLE answers ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE answers ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('answers');
	}

}

/* End of file 008_create_answers.php */
/* Location: ./application/migrations/008_create_answers.php */