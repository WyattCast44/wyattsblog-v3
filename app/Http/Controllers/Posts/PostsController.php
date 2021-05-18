<?php

namespace App\Http\Controllers\Posts;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create', 'store', 'edit', 'update']);
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $tags = Tag::all();

        return view('posts.create.index', [
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            'tags' => ['nullable', 'string'],
            'excerpt' => ['required', 'string', 'max:512'],
            'content' => ['required', 'string'],
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => Str::slug($request->excerpt),
            'content' => $request->content,
        ]);

        if($request->tags != null) {
        
            $tags = collect(json_decode($request->tags))->pluck('value')->toArray();

            $tags = collect($tags)->map(function($tag) {
    
                return Tag::firstOrCreate([
                    'name' => $tag,
                    'slug' => Str::slug($tag),
                ]);
    
            });

            $post->tags()->sync($tags->pluck('id'));
        }

        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $post->load(['tags']);

        $tags = Tag::all();

        return view('posts.edit.index', [
            'post' => $post,
            'tags' => $tags,
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'excerpt' => ['required', 'string', 'max:512'],
            'content' => ['required', 'string'],
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => Str::slug($request->excerpt),
            'content' => $request->content,
        ]);

        if($request->tags != null) {
        
            $tags = collect(json_decode($request->tags))->pluck('value')->toArray();

            $tags = collect($tags)->map(function($tag) {
    
                return Tag::firstOrCreate([
                    'name' => $tag,
                    'slug' => Str::slug($tag),
                ]);
    
            });

            $post->tags()->sync($tags->pluck('id'));
        }

        return redirect()->route('posts.show', $post);
    }
}
