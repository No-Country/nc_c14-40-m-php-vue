<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Pizza Manolo',
                'street' => 'Calle 123',
                'borough' => 'Buenos Aires',
                'cuisine' => 'Italian',
                'tables_number' => '10',
                'telephone' => '0123456789',
                'latitude' => '-34.56789',
                'longitud' => '150.67890'
            ],
            [
                'name' => 'Tacos Jesus',
                'street' => 'Calle 890',
                'borough' => 'Mexico DF',
                'cuisine' => 'Mexican',
                'tables_number' => '24',
                'telephone' => '439439203',
                'latitude' => '-5.53',
                'longitud' => '94.55'
            ]
        ];
        $this->db->table('restaurants')->insertBatch($data);
    }
}
