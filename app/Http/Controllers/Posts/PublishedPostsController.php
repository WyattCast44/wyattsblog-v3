<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublishedPostsController extends Controller
{
    public function create(Post $post)
    {
        $this->authorize('update', $post);

        $post->publish();

        return redirect()->route('posts.show', $post);
    }

    public function delete(Post $post)
    {
        $this->authorize('update', $post);

        $post->unpublish();

        return redirect()->route('posts.show', $post);
    }
}
