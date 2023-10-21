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
            'tables_number' => 10,
            'telephone' => '0123456789',
            'latitude' => '-34.56789',
            'longitude' => '150.67890',
            'user_id' => 1,
            'opening_hour' => '6:00:00',
            'closing_hour' => '21:00:00'
        ]);
    }
}
