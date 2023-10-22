<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Restaurant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user_count = intval(User::count());
        $restaurant_count = intval(Restaurant::count());
        return [
            'comment' => fake()->sentence(),
            'score' => rand(1, 5),
            'user_id' => rand(1, $user_count),
            'restaurant_id' => rand(1, $restaurant_count),
        ];
    }
}
