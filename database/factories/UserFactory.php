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
        return [
            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'username'=>fake()->unique()->userName(),
            // 'role'=>fake()->randomElement(['admin','user']),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
            [
                'name'=>"Umer",
            'email'=>"Umer@gmail.com",
            // 'username'=>"Umer121",
            'email_verified_at' => now(),
            'password'=>"111",
            'role'=>'admin',
            'remember_token' => Str::random(10)
        ],
        [
            'name'=>"Ali",
            'email'=>"ali@gmail.com",
            // 'username'=>"ali121",
            'email_verified_at' => now(),
            'password'=>"111",
            'role'=>'user',
            'remember_token' => Str::random(10)
        ]
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
