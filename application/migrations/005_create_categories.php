<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'category_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
				'auto_increment' => TRUE
			),
			'category_description' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
			)
		));
		$this->dbforge->add_key('category_id', TRUE);
        $this->dbforge->create_table('categories');
	}

	public function down() {
		$this->dbforge->drop_table('categories');
	}

}

/* End of file 005_create_categories.php */
/* Location: ./application/migrations/005_create_categories.php */