<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\AvailableDate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        User::factory(10)->create(); // <-- 10 users ≈ $this->call(UserSeeder::class) x 10;
        Restaurant::factory(200)->create(); // 200 restaurants ≈ $this->call(RestaurantSeeder::class) x 200;
        // RestaurantJSONSeeder::class, // <-- +3.000 RESTAURANTS
        $this->call(TablesSeeder::class); // <-- nº de Restaurants * nº de la columna 'tables_number' de cada Restaurant
        $this->call(AvailableDateSeeder::class);

        $this->call([

            // ReservationTableSeeder::class, // registro de reservaciones <-- PUEDE FALLAR LA MIGRACIÓN, SI FALLA VOLVER A INTENTAR!!!

            // ReviewsSeeder::class
        ]);

    }
}
