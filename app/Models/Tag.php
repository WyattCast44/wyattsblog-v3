<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function bookmarks()
    {
        return $this->morphedByMany(Bookmark::class, 'taggable');
    }
    
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
