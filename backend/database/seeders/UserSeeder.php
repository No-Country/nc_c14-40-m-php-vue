<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiUrl = 'https://randomuser.me/api/';
        $jsonData = file_get_contents($apiUrl);
        $data = json_decode($jsonData, true);
        $photo = $data['results'][0]['picture']['medium'];

        User::create([ # 1
        'name' => 'admin',
        'photo' => $photo,
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
        'password' =>  password_hash('password', PASSWORD_DEFAULT),
        'role' => 'admin',
        'isActive?' => true,
        'remember_token' => Str::random(10),
    ]);
    }
}
