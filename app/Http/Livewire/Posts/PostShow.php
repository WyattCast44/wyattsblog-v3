<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostShow extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public function mount(Post $post)
    {
        $this->authorize('view', $post);
        
        $this->post = $post->load('tags');
    }

    public function publish()
    {
        $this->authorize('update', $this->post);

        $this->post->publish();

        return redirect()->route('posts.show', $this->post);
    }

    public function unpublish()
    {
        $this->authorize('update', $this->post);

        $this->post->unpublish();

        return redirect()->route('posts.show', $this->post);
    }

    public function delete()
    {
        $this->authorize('delete', $this->post);

        $this->post->delete();

        return redirect()->route('blog.index');
    }
    
    public function render()
    {
        view()->share('pageMeta', [
            'title' => $this->post->title,
            'description' => Str::limit($this->post->excerpt, 255, '...'),
        ]);

        return view('posts.show.index')
            ->extends('posts.show.layout')
            ->section('page');
    }
}
