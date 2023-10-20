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
            'review_date' => now(),
            'user_id' => 1,
            'restaurant_id' => 1,
        ]);
        Review::create([
            'comment' => 'Esta vez no me gustó',
            'score' =>  1,
            'review_date' => now(),
            'user_id' => 1,
            'restaurant_id' => 1,
        ]);
        Review::create([
            'comment' => 'Es muy malo!',
            'score' =>  1,
            'review_date' => now(),
            'user_id' => 2,
            'restaurant_id' => 1,
        ]);
        Review::create([
            'comment' => 'Le di otra oportunidad y malísimo!',
            'score' =>  1,
            'review_date' => now(),
            'user_id' => 2,
            'restaurant_id' => 1,
        ]);
    }
}
