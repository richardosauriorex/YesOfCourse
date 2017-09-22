<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_lessons extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'lesson_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'lesson_description' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
			'course_id' => array(
				'type' => 'INT',
				'constraint' => '100',
				'unsigned' => TRUE
			)
		));
		$this->dbforge->add_key('lesson_id', TRUE);
        $this->dbforge->create_table('lessons');
	}

	public function down() {
		$this->dbforge->drop_table('lessons');
	}

}

/* End of file 006_create_lessons.php */
/* Location: ./application/migrations/006_create_lessons.php */