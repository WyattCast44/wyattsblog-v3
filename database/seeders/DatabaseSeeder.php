<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(10)->create();

        $posts->each(function($post) {

            $tags = Tag::factory()->times(rand(1, 3))->create();

            $post->tags()->attach($tags->pluck('id'));

        });
    }
}
