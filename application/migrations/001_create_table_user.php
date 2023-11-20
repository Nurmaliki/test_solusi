<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_user extends CI_Migration {

		public $table;

		function __construct() {
			$this->table = 'user';
	 	}
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'password' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
			'created_by' => array(
				'type' => 'VARCHAR',
                                'constraint' => '100',
			),
			'updated_by' => array(
				'type' => 'VARCHAR',
                                'constraint' => '100',
			),
			'deleted_by' => array(
				'type' => 'VARCHAR',
                                'constraint' => '100',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
                                'null' => TRUE,
			),
			'updated_at' => array(
				'type' => 'TIMESTAMP',
                                'null' => TRUE,
			),
			'deleted_at' => array(
				'type' => 'TIMESTAMP',
                                'null' => TRUE,
			),
			'is_active' => array(
				'type' => 'VARCHAR',
                                'constraint' => '2',
			),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table($this->table);
        }

        public function down()
        {
                $this->dbforge->drop_table($this->table);
        }
}
