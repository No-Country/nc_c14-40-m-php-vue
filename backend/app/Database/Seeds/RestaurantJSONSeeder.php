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

        $jsonFilePathImages = '..\app\Database\images_random.json';
        $jsonContentImages = file_get_contents($jsonFilePathImages);
        $imagesRandom = json_decode($jsonContentImages, true);

        if($restaurants !== null){
            $data = [];
            $id=0;
            foreach ($restaurants as $restaurant) {
                if($id===900){ $id=0; }
                $photo = $imagesRandom[$id]['random_image_picsum'];
                $data[] = [
                    'name' => $restaurant['name'],
                    'photo' => $photo,
                    'street' => $restaurant['address']['street'],
                    'borough' => $restaurant['borough'],
                    'cuisine' => $restaurant['cuisine'],
                    'tables_number' => rand(1, 100),
                    'telephone' => $restaurant['restaurant_id'],
                    'latitude' => $restaurant['address']['coord'][1],
                    'longitud' => $restaurant['address']['coord'][0]
                ];
                $id++;
            }
            $this->db->table('restaurants')->insertBatch($data);
        }else{
            echo "No se pudo leer el archivo JSON";
        }
    }
}
