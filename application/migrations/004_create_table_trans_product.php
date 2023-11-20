<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_trans_product extends CI_Migration {
        public $table;

        function __construct() {
                $this->table = 'trans_product';
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
                        'id_trans' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'id_product' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'product_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'product_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'price' => array(
				'type' => 'FLOAT',
                                'null' => TRUE,
			),
                        'currency' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'discount' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'dimention' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'unit' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
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
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table($this->table);
        }
        public function down()
        {
                $this->dbforge->drop_table($this->table);
        }
}
