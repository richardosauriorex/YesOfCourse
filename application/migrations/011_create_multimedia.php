<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_multimedia extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field([
			'multimedia_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => '100',
				'unsigned' => TRUE
			),
			'file_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
			),
			'file_type' => array(
				'type' => 'VARCHAR',
				'constraint' => '10'
			)
		]);
		$this->dbforge->add_key('multimedia_id', TRUE);
        $this->dbforge->create_table('multimedia');
        $this->db->query('ALTER TABLE multimedia ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE multimedia ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('multimedia');
	}

}

/* End of file 011_create_multimedia.php */
/* Location: ./application/migrations/011_create_multimedia.php */