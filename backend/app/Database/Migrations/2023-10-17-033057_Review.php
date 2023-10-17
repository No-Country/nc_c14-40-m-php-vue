<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Review extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'review_id' => [
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
            'comment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'score' => [
                'type' => 'ENUM',
                'constraint' => ['1','2','3','4','5'],
            ],
            'review_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addPrimaryKey(['review_id','user_id','restaurant_id']);
        $this->forge->addForeignKey('restaurant_id','restaurants','restaurant_id','CASCADE','SET NULL');
        $this->forge->addForeignKey('user_id','users','user_id','CASCADE','SET NULL');
        $this->forge->createTable('review');
    }

    public function down()
    {
        $this->forge->dropTable('review');
    }
}
