<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            UserSeeder::class, // <-- 2 USERS
            RestaurantSeeder::class, // <-- 2 RESTAURANTS
            // RestaurantJSONSeeder::class, // <-- +3.000 RESTAURANTS
            TablesSeeder::class, // <-- nº de Restaurants * nº de la columna 'tables_number' de cada Restaurant
            ReservationTableSeeder::class, // registro de reservaciones <-- PUEDE FALLAR LA MIGRACIÓN, SI FALLA VOLVER A INTENTAR!!!

            ReviewsSeeder::class
        ]);

    }
}
