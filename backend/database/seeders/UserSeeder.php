<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $images = [];
        for($i=0 ; $i<3 ; $i++){
            $apiUrl = 'https://randomuser.me/api/';
            $jsonData = file_get_contents($apiUrl);
            $data = json_decode($jsonData, true);
            $photo = $data['results'][0]['picture']['medium'];
            $images[] = $photo;
        }

        User::create([
            'name' => 'Manuel',
            'photo' => $images[0],
            'email' => 'manuel@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Sara',
            'photo' => $images[1],
            'email' => 'sara@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin'
        ]);
    }
}
