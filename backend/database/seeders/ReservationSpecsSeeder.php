<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationSpecs;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Available_date;


class ReservationSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_count = intval(User::count());
        $restaurant_count = intval(Restaurant::count());

        // ¡¡¡PUEDE NO FUNCIONAR!!!
        ReservationSpecs::create([
            'user_id' => rand(1, $user_count),
            'restaurant_id' => rand(1, $restaurant_count),
            'date_id' => rand(1,10),
            'quantity_people' => 10,
            'state_reservation' => "PE",
            'price' => 32.56,
        ]);
    }
}
