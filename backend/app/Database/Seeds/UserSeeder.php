<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Manuel',
                'email' => 'manuel@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
            [
                'name' => 'Isabela',
                'email' => 'isabela@outlook.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'restaurant'
            ],
            [
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'client'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
