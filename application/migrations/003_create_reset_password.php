<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_reset_password extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
		'user_id' => array(
			'type' => 'INT',
			'unsigned' => TRUE,
			'constraint' => '100'
    	),
    	'reset_code' => array(
    		'type' => 'VARCHAR',
    		'constraint' => '255',
    		'null' => FALSE
    	)
    	));
    	$this->dbforge->create_table('reset_password');
    	$this->db->query('ALTER TABLE reset_password ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
		$this->db->query('ALTER TABLE reset_password ADD COLUMN update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
	}

	public function down() {
		$this->dbforge->drop_table('reset_password');
	}

}

/* End of file 003_create_reset_password.php */
/* Location: ./application/migrations/003_create_reset_password.php */