<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'comment' => 'Esta muy bueno el restaurante',
            'score' =>  4,
            'user_id' => 1,
            'restaurant_id' => 1,
        ]);
    }
}
