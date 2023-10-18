<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantJSONSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jsonContent = file_get_contents(database_path('restaurants.json'));
        $restaurants = json_decode($jsonContent, true);
        
        $jsonContentImages = file_get_contents(database_path('images_random.json'));
        $imagesRandom = json_decode($jsonContentImages, true);

        if($restaurants !== null){
            $id=0;
            foreach ($restaurants as $restaurant) {
                if($id===900){ $id=0; }
                $photo = $imagesRandom[$id]['random_image_picsum'];
                Restaurant::create([
                    'name' => $restaurant['name'],
                    'photo' => $photo,
                    'street' => $restaurant['address']['street'],
                    'borough' => $restaurant['borough'],
                    'cuisine' => $restaurant['cuisine'],
                    'tables_number' => rand(1, 100),
                    'telephone' => $restaurant['restaurant_id'],
                    'latitude' => $restaurant['address']['coord'][1],
                    'longitud' => $restaurant['address']['coord'][0],
                    'user_id' => rand(1,2)
                ]);
                $id++;
            }

        }else{
            echo "No se pudo leer el archivo JSON";
        }
    }
}
