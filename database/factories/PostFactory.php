<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'image' => 'https://via.placeholder.com/640x480.png',
            'category' => $this->faker->randomElement(['Tech', 'Health', 'News']),
            'author' => $this->faker->name,
            'likes' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
