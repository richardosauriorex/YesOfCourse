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
			'lesson_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
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
        $this->db->query('ALTER TABLE lessons ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE lessons ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('lessons');
	}

}

/* End of file 006_create_lessons.php */
/* Location: ./application/migrations/006_create_lessons.php */