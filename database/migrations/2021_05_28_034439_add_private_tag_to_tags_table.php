<?php

use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;

class AddPrivateTagToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Tag::create([
            'name' => 'Private',
            'slug' => 'private',
            'public' => false,
        ]);
    }
}
