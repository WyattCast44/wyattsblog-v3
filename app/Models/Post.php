<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{    
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
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

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Actions/Abilities
    |--------------------------------------------------------------------------
    */

    public function publish(): bool
    {
        return $this->update([
            'published' => true, 
            'published_at' => now(),
        ]);
    }

    public function unpublish(): bool
    {
        return $this->update([
            'published' => false, 
            'published_at' => null,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
