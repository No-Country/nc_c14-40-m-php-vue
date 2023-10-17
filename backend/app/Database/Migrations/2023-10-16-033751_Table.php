<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Table extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'table_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'capacity' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'occupied' => [
                'type' => 'boolean',
                'default' => false
            ]
        ]);
        $this->forge->addPrimaryKey(['table_id', 'restaurant_id']);
        $this->forge->addForeignKey('restaurant_id','restaurant','restaurant_id','CASCADE','SET NULL');
        $this->forge->createTable('table');
    }

    public function down()
    {
        $this->forge->dropTable('table');
    }
}
