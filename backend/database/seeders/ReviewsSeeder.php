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
        // Revisión 3
        Review::create([
            'comment' => '¡Una experiencia inolvidable! La comida y el servicio son excelentes.',
            'score' => 5,
            'review_date' => now(),
            'user_id' => 3,
            'restaurant_id' => 2,
        ]);

        // Revisión 4
        Review::create([
            'comment' => 'Me encanta este lugar. La pizza es deliciosa y el ambiente es acogedor.',
            'score' => 4,
            'review_date' => now(),
            'user_id' => 4,
            'restaurant_id' => 2,
        ]);

        // Revisión 5
        Review::create([
            'comment' => 'No fue lo que esperaba. La comida estaba fría y el servicio fue lento.',
            'score' => 2,
            'review_date' => now(),
            'user_id' => 5,
            'restaurant_id' => 2,
        ]);

        // Revisión 6
        Review::create([
            'comment' => 'El restaurante tiene una buena relación calidad-precio. Definitivamente regresaré.',
            'score' => 4,
            'review_date' => now(),
            'user_id' => 6,
            'restaurant_id' => 3,
        ]);

        // Revisión 7
        Review::create([
            'comment' => 'El servicio fue horrible. No recomendaría este lugar a nadie.',
            'score' => 1,
            'review_date' => now(),
            'user_id' => 7,
            'restaurant_id' => 3,
        ]);

        // Revisión 8
        Review::create([
            'comment' => 'Buena comida, pero el restaurante estaba muy lleno y ruidoso.',
            'score' => 3,
            'review_date' => now(),
            'user_id' => 8,
            'restaurant_id' => 4,
        ]);

        // Revisión 9
        Review::create([
            'comment' => 'No cumplió con mis expectativas. La comida era insípida.',
            'score' => 2,
            'review_date' => now(),
            'user_id' => 9,
            'restaurant_id' => 4,
        ]);

        // Revisión 10
        Review::create([
            'comment' => '¡Maravilloso! El servicio y la comida son excepcionales.',
            'score' => 5,
            'review_date' => now(),
            'user_id' => 10,
            'restaurant_id' => 5,
        ]);

    }
}
