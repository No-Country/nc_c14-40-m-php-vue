<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        User::factory(10)->create(); // <-- 10 users ≈ $this->call(UserSeeder::class) x 10;
       
        $this->call([
            // UserSeeder::class, // <-- 2 USERS
            // RestaurantSeeder::class, // <-- 2 RESTAURANTS
            // // RestaurantJSONSeeder::class, // <-- +3.000 RESTAURANTS
            // TablesSeeder::class, // <-- nº de Restaurants * nº de la columna 'tables_number' de cada Restaurant
            // AvailableDateSeeder::class,
            // ReservationTableSeeder::class, // registro de reservaciones <-- PUEDE FALLAR LA MIGRACIÓN, SI FALLA VOLVER A INTENTAR!!!

            // ReviewsSeeder::class
        ]);

    }
}
