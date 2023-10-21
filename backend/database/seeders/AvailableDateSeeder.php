<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Available_date;
use App\Models\Restaurant;

class AvailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Available_date::create([
            'restaurant_id' => 1,
            'day' => 'Lunes',
            'hour_start' => '9:00:00',
            'hour_end' => '10:00:00',
            'isFull?' => 0,
        ]);

        Available_date::create([
            'restaurant_id' => 1,
            'day' => 'Lunes',
            'hour_start' => '10:00:00',
            'hour_end' => '11:00:00',
            'isFull?' => 0,
        ]);

        Available_date::create([
            'restaurant_id' => 1,
            'day' => 'Lunes',
            'hour_start' => '11:00:00',
            'hour_end' => '12:00:00',
            'isFull?' => 0,
        ]);

        Available_date::create([
            'restaurant_id' => 1,
            'day' => 'Lunes',
            'hour_start' => '12:00:00',
            'hour_end' => '13:00:00',
            'isFull?' => 0,
        ]);
            
    }
}


