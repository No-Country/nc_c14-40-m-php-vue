<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reservation_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => 5,
            ],
            'quantity_people' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'stateReservation' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'confirmed', 'canceled'],
            ],
            'reservation_date' => [
                'type' => 'DATETIME',
                'null' => false,
            ]
        ]);

        $this->forge->addPrimaryKey(['reservation_id', 'restaurant_id','user_id']);
        $this->forge->addForeignKey('restaurant_id','restaurants','restaurant_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('user_id','users','user_id','CASCADE','SET NULL');
        $this->forge->createTable('reservations');
    }

    public function down()
    {
        $this->forge->dropTable('reservations');
    }
}
