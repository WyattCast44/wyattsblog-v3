<?php

namespace App\Http\Livewire\Posts;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostCreate extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public $allTags;

    public $tags = [];

    protected $rules = [
        'post.title' => ['required', 'string', 'max:255'],
        'post.slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:App\Models\Post,slug'],
        'post.excerpt' => ['nullable', 'string', 'max:512'],
        'post.content' => ['nullable', 'string'],
        'tags' => ['nullable', 'array']
    ];

    public function mount()
    {
        $this->authorize('create', Post::class);

        $this->allTags = Tag::all();

        $this->post = new Post([
            'published' => false,
        ]);
    }

    public function changeTags(string $tags): void
    {
        if (empty($tags)) {
            return;
        }

        $changed = collect(json_decode($tags))->pluck('value')->toArray();

        $this->tags = array_unique(array_merge($this->tags, $changed));
    }
    
    public function updatedPostTitle($value)
    {
        $this->post->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $this->authorize('create', Post::class);

        $this->post->save();
        
        $tags = collect($this->tags)->map(function($tag) {

            return Tag::firstOrCreate([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);

        });

        $this->post->tags()->sync($tags->pluck('id'));

        return redirect()->route('posts.show', $this->post);
    }

    public function render()
    {
        view()->share('pageMeta', [
            'title' => 'Create Post',
        ]);

        return view('posts.create.index')->extends('posts.create.layout')->section('page');
    }
}
