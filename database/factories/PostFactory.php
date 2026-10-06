<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'title'   => fake()->sentence(6),
            'body'    => fake()->paragraphs(3, true),
            'status'  => fake()->randomElement(['published', 'published', 'published', 'pending']),
        ];
    }
}