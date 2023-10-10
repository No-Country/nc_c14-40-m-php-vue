<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class RestaurantJSONSeeder extends Seeder
{
    public function run()
    {
        $jsonFilePath = '..\app\Database\restaurants.json';
        $jsonContent = file_get_contents($jsonFilePath);
        $restaurants = json_decode($jsonContent, true);

        if($restaurants !== null){
            $data = [];
            foreach ($restaurants as $restaurant) {
                $data[] = [
                    'name' => $restaurant['name'],
                    'street' => $restaurant['address']['street'],
                    'borough' => $restaurant['borough'],
                    'cuisine' => $restaurant['cuisine'],
                    'tables_number' => rand(1, 100),
                    'telephone' => $restaurant['restaurant_id'], // dato incorrecto pero es de prueba!
                    'latitude' => $restaurant['address']['coord'][1],
                    'longitud' => $restaurant['address']['coord'][0]
                ];
            }
            $this->db->table('restaurants')->insertBatch($data);
        }else{
            echo "No se pudo leer el archivo JSON";
        }
    }
}
