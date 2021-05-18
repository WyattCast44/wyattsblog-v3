<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;

class BlogCategoriesController extends Controller
{
    public function index()
    {
        view()->share('pageMeta', [
            'title' => 'Blog Categories',
        ]);

        $tags = Tag::with(['posts'])->get()->filter(function($tag) {
            return ($tag->posts()->published()->count() > 0);
        });

        return view('blog.categories.index', [
            'tags' => $tags,
        ]);
    }

    public function show(Tag $tag)
    {
        view()->share('pageMeta', [
            'title' => 'Blog Category ' . $tag->name,
        ]);

        $tag->load('posts');

        $posts = $tag->posts->filter(function($post) {
            if (auth()->check()) {
                return true;
            }
            
            return ($post->published);
        });

        return view('blog.categories.show', [
            'posts' => $posts,
            'tag' => $tag
        ]);
    }
}
