<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
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
