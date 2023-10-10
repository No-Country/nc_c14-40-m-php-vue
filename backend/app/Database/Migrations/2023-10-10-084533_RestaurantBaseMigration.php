<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RestaurantBaseMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'borough' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cuisine' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tables_number' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'longitud' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('restaurant_id', true);
        $this->forge->createTable('restaurants');
    }

    public function down()
    {
        $this->forge->dropTable('restaurants');
    }
}
