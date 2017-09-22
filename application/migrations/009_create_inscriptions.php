<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_inscriptions extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
				'inscription_id' => array(
					'type' => 'INT',
					'constraint' => '100',
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'user_id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'default' => TRUE
				),
				'course_id' => array(
					'type' => 'INT',
					'default' => TRUE,
					'unsigned' => TRUE
				),
				'status_id' => array(
			        'type' => 'INT',
					'unsigned' => TRUE
				)
		));
		$this->dbforge->add_key('inscription_id', TRUE);
		$this->dbforge->create_table('inscriptions');
	}

	public function down() {
		$this->dbforge->drop_table('inscriptions');
	}

}

/* End of file 009_create_inscriptions.php */
/* Location: ./application/migrations/009_create_inscriptions.php */