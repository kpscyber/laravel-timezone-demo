<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph(3),
            'user_id' => 1,
            'published_up' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'published_down' => $this->faker->dateTimeBetween('+1 week', '+2 week'),
        ];
    }
}
