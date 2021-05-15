<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        view()->share('pageMeta', [
            'title' => 'Blog',
            'description' => 'My writings on various topics.',
        ]);

        if(auth()->check()) {
            $posts = Post::latest()->with(['tags'])->get();
        } else {
            $posts = Post::published()->latest('published_at')->with(['tags'])->get();
        }

        return view('blog.index', [
            'posts' => $posts
        ]);
    }
}
