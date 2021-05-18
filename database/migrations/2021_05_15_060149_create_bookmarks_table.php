<?php

use App\Models\Bookmark;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->string('url_hash')->unique();
            $table->string('title')->index()->nullable();
            $table->text('description')->nullable();
            $table->string('type')->index()->nullable();
            $table->json('data')->nullable();
            $table->string('status')->index()->default(Bookmark::$states['waiting']);
            $table->boolean('public')->index()->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
