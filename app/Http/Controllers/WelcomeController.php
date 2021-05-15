<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        view()->share('pageMeta', [
            'title' => 'Home'
        ]);

        $posts = Post::published()->latest('published_at')->limit(3)->get();

        return view('welcome', [
            'posts' => $posts,
        ]);
    }
}
