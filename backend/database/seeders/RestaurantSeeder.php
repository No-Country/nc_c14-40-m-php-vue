<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Restaurant::create([
            'name' => 'Pizza Manolo',
            'photo' => '',
            'street' => 'Calle 123',
            'borough' => 'Buenos Aires',
            'cuisine' => 'Italian',
            'tables_number' => '10',
            'telephone' => '0123456789',
            'latitude' => '-34.56789',
            'longitud' => '150.67890'
        ]);
        Restaurant::create([
            'name' => 'Tacos Jesus',
            'photo' => '',
            'street' => 'Calle 890',
            'borough' => 'Mexico DF',
            'cuisine' => 'Mexican',
            'tables_number' => '24',
            'telephone' => '439439203',
            'latitude' => '-5.53',
            'longitud' => '94.55'
        ]);
    }
}
