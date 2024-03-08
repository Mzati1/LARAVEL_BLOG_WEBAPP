<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() // :array
    {
        $title = fake()->realText(15);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => fake()->imageUrl(),
            'body' => fake()->realText(50000),
            'active' => 1,
            'published_at' => fake()->dateTime(),
            'user_id' => 1
        ];
    }
}
