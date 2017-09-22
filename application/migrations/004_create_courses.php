<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_courses extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'course_id' => array(
				'type' => 'INT',
				'default' => TRUE,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'course_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE
			),
			'description' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
			'user_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'default' => TRUE
            ),
            'category_id' => array(
            	'type' => 'INT',
				'unsigned' => TRUE,
				'default' => TRUE
            ),
            'status_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => FALSE
			)
		));
		$this->dbforge->add_key('course_id', TRUE);
        $this->dbforge->create_table('courses');
	}

	public function down() {
		$this->dbforge->drop_table('courses');
	}

}

/* End of file 004_create_courses.php */
/* Location: ./application/migrations/004_create_courses.php */