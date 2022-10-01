<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'blog_author_id' => '1',
            'blog_category_id' => '1',
            'title' => fake()->name(),
            'banner' => null,
            'slug' => Str::random(10),
            'excerpt' => fake()->text(50),
            'content' => fake()->paragraph(),
            'published_at' => now(),
        ];
    }
}
