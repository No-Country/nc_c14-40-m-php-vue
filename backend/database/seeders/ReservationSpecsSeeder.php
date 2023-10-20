<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationSpecs;
use App\Models\ReservationTable;

class ReservationSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationSpecs::create([
            'reservation_date' => now(),
            'quantity_people' => 10,
            'state_reservation' => "PE",
            'price' => 32.56,
        ]);
    }
}
