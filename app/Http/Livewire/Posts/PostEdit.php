<?php

namespace App\Http\Livewire\Posts;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostEdit extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public $allTags;

    public $tags = [];

    public function rules() 
    {
        return [
            'post.title' => ['required', 'string', 'max:255'],
            'post.slug' => [
                'required', 'string', 'max:255', 'alpha_dash', 
                Rule::unique('posts', 'slug')->ignore($this->post->id),
            ],
            'post.excerpt' => ['nullable', 'string', 'max:512'],
            'post.content' => ['nullable', 'string'],
            'tags' => ['nullable', 'array']
        ];        
    }

    public function mount(Post $post)
    {
        $this->authorize('update', $this->post);

        $this->post = $post->load('tags');

        $this->allTags = Tag::all();
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

        $this->authorize('update', $this->post);

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
            'title' => 'Edit ' . $this->post->title,
        ]);

        return view('posts.create.index')->extends('posts.create.layout')->section('page');
    }
}
