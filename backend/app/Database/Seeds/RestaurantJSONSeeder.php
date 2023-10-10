<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RestaurantJSONSeeder extends Seeder
{
    public function run()
    {
        $jsonContent = file_get_contents('app/database/restaurants.json');

        $restaurants = json_decode($jsonContent, true);

        if($restaurants !== null){
            foreach ($restaurants as $restaurant) {
                $data = [
                    'name' => $restaurant['name'],
                    'street' => $restaurant['address']['street'],
                    'borough' => $restaurant['borough'],
                    'cuisine' => $restaurant['cuisine'],
                    'tables_number' => rand(1, 100),
                    'telephone' => $restaurant['restaurant_id'], // dato incorrecto pero es de prueba!
                    'latitude' => $restaurant['coord'][1],
                    'longitud' => $restaurant['coord'][0]
                ];
                $this->db->table('restaurants')->insertBatch($data);
            }
        }
    }
}
