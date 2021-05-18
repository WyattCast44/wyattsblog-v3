<?php

namespace Database\Factories;

use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookmark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $url = $this->faker->url,
            'url_hash' => md5($url),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => 'link',
            'data' => null,
            'status' => Bookmark::$states['waiting'],
            'public' => (bool) rand(0, 1),
        ];
    }
}
