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
				'aprobed_lessons' => array(
					'type' => 'INT',
					'constraint' => '11'
				),
				'reprobed_lessons' => array(
					'type' => 'INT',
					'constraint' => '11'
				),
				'user_id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'constraint' => '100'
				),
				'course_id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'constraint' => '100'
				),
				'status_id' => array(
			        'type' => 'INT',
					'unsigned' => TRUE,
					'constraint' => '100'
				)
		));
		$this->dbforge->add_key('inscription_id', TRUE);
		$this->dbforge->create_table('inscriptions');
		$this->db->query('ALTER TABLE inscriptions ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE inscriptions ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('inscriptions');
	}

}

/* End of file 009_create_inscriptions.php */
/* Location: ./application/migrations/009_create_inscriptions.php */