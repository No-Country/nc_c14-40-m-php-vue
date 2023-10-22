<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationSpecs;
use App\Models\User;
use App\Models\Restaurant;


class ReservationSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_count = intval(User::count());
        $restaurant_count = intval(Restaurant::count());
                    
        ReservationSpecs::create([
            'quantity_people' => rand(1,15),
            'state_reservation' => "PE",
            'price' => 2,
            'user_id' => rand(1, $user_count),
            'restaurant_id' => rand(1, $restaurant_count),
        ]);
    }
}
