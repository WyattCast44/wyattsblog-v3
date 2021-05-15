<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->words(rand(3, 8), true),
            'slug' => Str::slug($title),
            'excerpt' => Str::limit($this->faker->paragraph, 280, '...'),
            'content' => $this->faker->paragraphs(rand(2, 15), true),
            'published' => (bool) $status = rand(0, 1),
            'published_at' => ($status) ? now() : null,
        ];
    }

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => true,
                'published_at' => now(),
            ];
        });
    }

    public function unpublished(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => false,
                'published_at' => null,
            ];
        });
    }
}
