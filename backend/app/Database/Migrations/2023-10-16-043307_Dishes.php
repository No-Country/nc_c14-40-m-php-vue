<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dishes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dish' => [
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
            'id_category' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => 10,
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ]
        ]);

        $this->forge->addPrimaryKey(['id_dish', 'restaurant_id']);
        $this->forge->addForeignKey('restaurant_id','restaurants','restaurant_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('user_id','users','user_id','CASCADE','SET NULL');
        $this->forge->createTable('dishes');
    }

    public function down()
    {
        $this->forge->dropTable('dishes');
    }
}
