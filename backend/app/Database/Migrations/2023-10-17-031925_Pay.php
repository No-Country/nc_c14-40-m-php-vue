<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pay' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'reservation_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'restaurant_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => 10,
            ],
            'pay_date' => [
                'type' => 'DATE',
            ]
        ]);

        $this->forge->addPrimaryKey(['id_pay','reservation_id','restaurant_id','user_id']);
        $this->forge->addForeignKey('restaurant_id','restaurants','restaurant_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('user_id','users','user_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('reservation_id','reservations','user_id','CASCADE','SET NULL');
        $this->forge->createTable('pay');
    }

    public function down()
    {
        $this->forge->dropTable('pay');
    }
}
