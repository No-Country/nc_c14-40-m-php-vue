<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'photo' => '',
            'street' => fake()->streetAddress(),
            'borough' => fake()->city(),
            'cuisine' => fake()->country(),
            'tables_number' => rand(1,25),
            'telephone' => fake()->phoneNumber(),
            'user_id' => User::inRandomOrder()->first()->id,
            'opening_hour' => fake()->time($format = 'H:00:00'),
            'closing_hour' => fake()->time($format = 'H:00:00'),
            'country' => fake()->country()
        ];
    }
}
