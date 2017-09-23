<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_foreign_keys extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up() {
		/*foreign key referenced status table*/
		$this->db->query('ALTER TABLE users ADD FOREIGN KEY (status_id) REFERENCES status(status_id)');
		$this->db->query('ALTER TABLE courses ADD FOREIGN KEY (status_id) REFERENCES status(status_id)');
		$this->db->query('ALTER TABLE inscriptions ADD FOREIGN KEY (status_id) REFERENCES status(status_id)');
		$this->db->query('ALTER TABLE answers ADD FOREIGN KEY (status_id) REFERENCES status(status_id)');
		/*foreign key referenced users table*/
		$this->db->query('ALTER TABLE reset_password ADD FOREIGN KEY (user_id) REFERENCES users(user_id)');
		$this->db->query('ALTER TABLE courses ADD FOREIGN KEY (user_id) REFERENCES users(user_id)');
		$this->db->query('ALTER TABLE inscriptions ADD FOREIGN KEY (user_id) REFERENCES users(user_id)');
		/*foreing key referenced categories table*/
		$this->db->query('ALTER TABLE courses ADD FOREIGN KEY (category_id) REFERENCES categories(category_id)');
		/*foreign key referenced courses table*/
		$this->db->query('ALTER TABLE inscriptions ADD FOREIGN KEY (course_id) REFERENCES courses(course_id)');
		$this->db->query('ALTER TABLE lessons ADD FOREIGN KEY (course_id) REFERENCES courses(course_id)');
		/*foreign key referenced lessons table*/
		$this->db->query('ALTER TABLE results ADD FOREIGN KEY (lesson_id) REFERENCES lessons(lesson_id)');
		$this->db->query('ALTER TABLE evaluations ADD FOREIGN KEY (lesson_id) REFERENCES lessons(lesson_id)');
		/*foreign key referenced evaluations table*/
		$this->db->query('ALTER TABLE answers ADD FOREIGN KEY (evaluation_id) REFERENCES evaluations(evaluation_id)');
		/*foreign key referenced inscriptions table*/
		$this->db->query('ALTER TABLE results ADD FOREIGN KEY (inscription_id) REFERENCES inscriptions(inscription_id)');

	}

	public function down() {
		$this->db->query('ALTER TABLE users DROP FOREIGN KEY users_ibfk_1');
		$this->db->query('ALTER TABLE courses DROP FOREIGN KEY courses_ibfk_1');
		$this->db->query('ALTER TABLE courses DROP FOREIGN KEY courses_ibfk_2');
		$this->db->query('ALTER TABLE courses DROP FOREIGN KEY courses_ibfk_3');
		$this->db->query('ALTER TABLE inscriptions DROP FOREIGN KEY inscriptions_ibfk_1');
		$this->db->query('ALTER TABLE inscriptions DROP FOREIGN KEY inscriptions_ibfk_2');
		$this->db->query('ALTER TABLE inscriptions DROP FOREIGN KEY inscriptions_ibfk_3');
		$this->db->query('ALTER TABLE answers DROP FOREIGN KEY answers_ibfk_1');
		$this->db->query('ALTER TABLE answers DROP FOREIGN KEY answers_ibfk_2');
		$this->db->query('ALTER TABLE reset_password DROP FOREIGN KEY reset_password_ibfk_1');
		$this->db->query('ALTER TABLE lessons DROP FOREIGN KEY lessons_ibfk_1');
		$this->db->query('ALTER TABLE results DROP FOREIGN KEY results_ibfk_1');
		$this->db->query('ALTER TABLE results DROP FOREIGN KEY results_ibfk_2');
		$this->db->query('ALTER TABLE evaluations DROP FOREIGN KEY evaluations_ibfk_1');




	}

}

/* End of file 011_create_foreign_keys.php */
/* Location: ./application/migrations/011_create_foreign_keys.php */