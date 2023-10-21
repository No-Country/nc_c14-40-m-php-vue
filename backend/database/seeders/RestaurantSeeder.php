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
        Restaurant::create([
            'name' => 'Tacos Jesus',
            'photo' => '',
            'street' => 'Calle 890',
            'borough' => 'Mexico DF',
            'cuisine' => 'Mexican',
            'tables_number' => 10,
            'telephone' => '439439203',
            'latitude' => '-5.53',
            'longitude' => '94.55',
            'user_id' => 2,
            'opening_hour' => '6:00:00',
            'closing_hour' => '11:45:00'
        ]);
        // Restaurante 1 en Perú
        Restaurant::create([
            'name' => 'Cevichería Don Pedro',
            'photo' => '',
            'street' => 'Avenida del Mar 123',
            'borough' => 'Lima',
            'cuisine' => 'Peruvian',
            'tables_number' => 10,
            'telephone' => '0123456789',
            'latitude' => '-12.046374',
            'longitude' => '-77.042793',
            'user_id' => 3,
            'opening_hour' => '11:00:00',
            'closing_hour' => '20:30:00'
        ]);

        // Restaurante 2 en Perú
        Restaurant::create([
            'name' => 'Parrillada El Gaucho',
            'photo' => '',
            'street' => 'Calle del Asado 456',
            'borough' => 'Arequipa',
            'cuisine' => 'Argentinian',
            'tables_number' => 18,
            'telephone' => '987654321',
            'latitude' => '-16.409047',
            'longitude' => '-71.537451',
            'user_id' => 4,
            'opening_hour' => '12:30:00',
            'closing_hour' => '22:00:00'
        ]);
        // Restaurante 1 en España
        Restaurant::create([
            'name' => 'Tapas Bar de Madrid',
            'photo' => '',
            'street' => 'Calle de las Tapas 456',
            'borough' => 'Madrid',
            'cuisine' => 'Spanish',
            'tables_number' => 10,
            'telephone' => '917890123',
            'latitude' => '40.416775',
            'longitude' => '-3.703790',
            'user_id' => 5,
            'opening_hour' => '10:00:00',
            'closing_hour' => '23:00:00'
        ]);

        // Restaurante 2 en España
        Restaurant::create([
            'name' => 'Paella Paradise',
            'photo' => '',
            'street' => 'Calle del Arroz 789',
            'borough' => 'Valencia',
            'cuisine' => 'Spanish',
            'tables_number' => 16,
            'telephone' => '654321098',
            'latitude' => '39.469907',
            'longitude' => '-0.376288',
            'user_id' => 6,
            'opening_hour' => '11:30:00',
            'closing_hour' => '22:00:00'
        ]);
        // Restaurante 3 en Perú
        Restaurant::create([
            'name' => 'Pollos a la Brasa El Buen Sabor',
            'photo' => '',
            'street' => 'Calle del Sabor 789',
            'borough' => 'Lima',
            'cuisine' => 'Peruvian',
            'tables_number' => 10,
            'telephone' => '987654321',
            'latitude' => '-12.090218',
            'longitude' => '-77.036957',
            'user_id' => 7,
            'opening_hour' => '12:00:00',
            'closing_hour' => '21:00:00'
        ]);

        // Restaurante 4 en Perú
        Restaurant::create([
            'name' => 'La Causa Criolla',
            'photo' => '',
            'street' => 'Avenida de las Papas 456',
            'borough' => 'Lima',
            'cuisine' => 'Peruvian',
            'tables_number' => 15,
            'telephone' => '0123456789',
            'latitude' => '-12.119383',
            'longitude' => '-77.031964',
            'user_id' => 8,
            'opening_hour' => '11:30:00',
            'closing_hour' => '20:00:00'
        ]);
        // Restaurante 3 en España
        Restaurant::create([
            'name' => 'Gastrobar La Tapa',
            'photo' => '',
            'street' => 'Calle de las Tapas 789',
            'borough' => 'Barcelona',
            'cuisine' => 'Spanish',
            'tables_number' => 12,
            'telephone' => '932098765',
            'latitude' => '41.385724',
            'longitude' => '2.171447',
            'user_id' => 9,
            'opening_hour' => '10:00:00',
            'closing_hour' => '22:30:00'
        ]);

        // Restaurante 4 en España
        Restaurant::create([
            'name' => 'Mariscos del Mar',
            'photo' => '',
            'street' => 'Paseo de los Mariscos 456',
            'borough' => 'Valencia',
            'cuisine' => 'Spanish',
            'tables_number' => 15,
            'telephone' => '963258741',
            'latitude' => '39.457767',
            'longitude' => '-0.356382',
            'user_id' => 10,
            'opening_hour' => '12:00:00',
            'closing_hour' => '21:30:00'
        ]);

    }
}
