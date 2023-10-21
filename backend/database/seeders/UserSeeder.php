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
        for($i=0 ; $i<17 ; $i++){
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
            'role' => 'admin',
            'isActive?' => true
        ]);
        User::create([
            'name' => 'Sara',
            'photo' => $images[1],
            'email' => 'sara@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin',
            'isActive?' => true
        ]);
        
        // Usuario 3
        User::create([
            'name' => 'Luis',
            'photo' => $images[2],
            'email' => 'luis@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 4
        User::create([
            'name' => 'Ana',
            'photo' => $images[3],
            'email' => 'ana@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 5
        User::create([
            'name' => 'Carlos',
            'photo' => $images[4],
            'email' => 'carlos@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 6
        User::create([
            'name' => 'Elena',
            'photo' => $images[5],
            'email' => 'elena@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 7
        User::create([
            'name' => 'Diego',
            'photo' => $images[6],
            'email' => 'diego@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 8
        User::create([
            'name' => 'Marta',
            'photo' => $images[7],
            'email' => 'marta@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 9
        User::create([
            'name' => 'Javier',
            'photo' => $images[8],
            'email' => 'javier@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 10
        User::create([
            'name' => 'Laura',
            'photo' => $images[9],
            'email' => 'laura@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 11
        User::create([
            'name' => 'Pablo',
            'photo' => $images[10],
            'email' => 'pablo@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 12
        User::create([
            'name' => 'Isabel',
            'photo' => $images[11],
            'email' => 'isabel@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 13
        User::create([
            'name' => 'Felipe',
            'photo' => $images[12],
            'email' => 'felipe@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user',
            'isActive?' => true
        ]);

        // Usuario 14
        User::create([
            'name' => 'Sofía',
            'photo' => $images[13],
            'email' => 'sofia@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin',
            'isActive?' => true
        ]);

        // Usuario 15
        User::create([
            'name' => 'Pedro',
            'photo' => $images[14],
            'email' => 'pedro@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin',
            'isActive?' => true
        ]);


    }
}
