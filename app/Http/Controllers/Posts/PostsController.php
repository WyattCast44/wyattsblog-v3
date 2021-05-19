<?php

namespace App\Http\Controllers\Posts;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show']);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        view()->share('pageMeta', [
            'title' => $post->title,
            'description' => Str::limit($post->excerpt, 255, '...'),
        ]);

        return view('posts.show.index', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        view()->share('pageMeta', [
            'title' => 'Create New Post'
        ]);

        return view('posts.create.index', [
            'tags' => Tag::all(),
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        $this->authorize('create', Post::class);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
        ]);

        if($request->hasTags()) {
        
            $tags = collect(json_decode($request->tags))
                ->pluck('value')
                ->map(function($tag) {
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

        view()->share('pageMeta', [
            'title' => 'Update Post - ' . $post->title,
        ]);

        return view('posts.edit.index', [
            'post' => $post->load(['tags']),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
        ]);

        if($request->hasTags()) {
        
            $tags = collect(json_decode($request->tags))
                ->pluck('value')
                ->map(function($tag) {
                    return Tag::firstOrCreate([
                        'name' => $tag,
                        'slug' => Str::slug($tag),
                    ]);
            });

            $post->tags()->sync($tags->pluck('id'));
        }

        return redirect()->route('posts.show', $post);
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('blog.index');
    }
}
