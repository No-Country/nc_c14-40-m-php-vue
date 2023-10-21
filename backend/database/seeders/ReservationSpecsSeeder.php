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
        // $user_count = intval(User::count());
        $restaurant_count = intval(Restaurant::count());
        
        $restaurant_selected =  1; // random restaurant
            
        ReservationSpecs::create([
            'quantity_people' => 10,
            'state_reservation' => "PE",
            'price' => 2,
            'user_id' => 1,
            'restaurant_id' => $restaurant_selected,
        ]);
    }
}
