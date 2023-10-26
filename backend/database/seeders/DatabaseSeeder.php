<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(UserSeeder::class);
        User::factory(9)->create(); // <-- 10 users ≈ $this->call(UserSeeder::class) x 10;
        // Restaurant::factory(200)->create(); // 200 restaurants ≈ $this->call(RestaurantSeeder::class) x 200;
        $this->call(RestaurantSeeder::class);
        // RestaurantJSONSeeder::class, // <-- +3.000 RESTAURANTS
        $this->call(TablesSeeder::class); // <-- nº de Restaurants * nº de la columna 'tables_number' de cada Restaurant
        $this->call(AvailableDateSeeder::class); // <-- genera: horas de trabajo (closing_hour - opening_hour) * 7 dias a la semana * nº de restaurantes
        $this->call(ReservationTableSeeder::class); // <-- genera 1000 posibles reservas (algunas descartadas por 3 motivos [ver en el propio Seeder])
        Review::factory(4000)->create(); // 4.000 reviews ≈ $this->call(UserSeeder::class) x 4.000;
    }
}
