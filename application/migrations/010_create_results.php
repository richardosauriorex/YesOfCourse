<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_results extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'result_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'number_questions' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE
			),
			'good_answers' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE
			),
			'qualification' => array(
				'type' => 'FLOAT',
				'constraint' => '5,2',
				'null' => FALSE
			),
			'inscription_id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'constraint' => '100'
			),
			'lesson_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100'
			)
		));
		$this->dbforge->add_key('result_id', TRUE);
		$this->dbforge->create_table('results');
		$this->db->query('ALTER TABLE results ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE results ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('results');
	}

}

/* End of file 010_create_results.php */
/* Location: ./application/migrations/010_create_results.php */