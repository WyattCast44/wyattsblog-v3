<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'public' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes/Queries
    |--------------------------------------------------------------------------
    */

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('public', true);
    }

    public function scopePrivate(Builder $query): Builder
    {
        return $query->where('public', false);
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
