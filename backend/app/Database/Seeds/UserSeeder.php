<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        $images = [];
        for($i=0 ; $i<3 ; $i++){
            $apiUrl = 'https://randomuser.me/api/';
            $jsonData = file_get_contents($apiUrl);
            $data = json_decode($jsonData, true);
            $photo = $data['results'][0]['picture']['medium'];
            $images[] = $photo;
        }

        $data = [
            [
                'name' => 'Manuel',
                'photo' => $images[0],
                'email' => 'manuel@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
            [
                'name' => 'Isabela',
                'photo' => $images[1],
                'email' => 'isabela@outlook.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'restaurant'
            ],
            [
                'name' => 'Juan',
                'photo' => $images[2],
                'email' => 'juan@gmail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'role' => 'client'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
