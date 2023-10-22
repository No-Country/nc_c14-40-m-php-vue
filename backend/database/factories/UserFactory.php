<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $apiUrl = 'https://randomuser.me/api/';
        $jsonData = file_get_contents($apiUrl);
        $data = json_decode($jsonData, true);
        $photo = $data['results'][0]['picture']['medium'];

        return [
            'name' => fake()->name(),
            'photo' => $photo,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' =>  password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin',
            'isActive?' => true,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
