<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		$this->dbforge->add_field(array(
                        'user_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'default' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'last_mother_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'authentication_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE
                        ),
                        'status_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'null' => FALSE
                        )
                ));
                $this->dbforge->add_key('user_id', TRUE);
                $this->dbforge->create_table('users');
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}

/* End of file 001_create_users.php */
/* Location: ./application/migrations/001_create_users.php */