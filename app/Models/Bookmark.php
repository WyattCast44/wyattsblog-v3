<?php

namespace App\Models;

use App\Jobs\Bookmarks\ProcessNewBookmark;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static array $states = [
        'waiting' => 'waiting',
        'processing' => 'processing',
        'processed' => 'processed',
        'failed' => 'failed',
    ];

    protected static function booted(): void
    {
        static::created(function ($bookmark) {
            ProcessNewBookmark::dispatch($bookmark);
        });
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

    public function scopeProcessed(Builder $query): Builder
    {
        return $query->where('status', self::$states['processed']);
    }

    /*
    |--------------------------------------------------------------------------
    | Actions/Abilities
    |--------------------------------------------------------------------------
    */

    //

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
