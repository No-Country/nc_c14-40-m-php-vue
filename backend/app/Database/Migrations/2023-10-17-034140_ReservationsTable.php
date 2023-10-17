<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reservation_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
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
            'table_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ]
        ]);

        $this->forge->addPrimaryKey(['reservation_id','user_id','restaurant_id','table_id']);
        $this->forge->addForeignKey('restaurant_id','restaurants','restaurant_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('user_id','users','user_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('reservation_id','reservations','reservation_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('table_id','table','table_id','CASCADE','SET NULL');
        $this->forge->createTable('reservationsTable');
    }

    public function down()
    {
        $this->forge->dropTable('reservationsTable');
    }
}
