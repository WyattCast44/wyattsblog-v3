<?php

namespace App\Http\Controllers\Bookmarks;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class BookmarksCategoriesController extends Controller
{
    public function index()
    {
        view()->share('pageMeta', [
            'title' => 'Bookmark Categories',
        ]);

        $tags = Tag::with(['bookmarks'])->orderBy('name')->get()->filter(function($tag) {
            return ($tag->bookmarks()->processed()->count() > 0);
        });

        return view('bookmarks.categories.index', [
            'tags' => $tags,
        ]);
    }

    public function show(Tag $tag)
    {
        view()->share('pageMeta', [
            'title' => 'Bookmark Category ' . $tag->name,
        ]);

        $tag->load('bookmarks');

        $bookmarks = $tag->bookmarks->filter(function($bookmark) {
            return $bookmark->hasProcessedSuccessfully();
        });

        return view('bookmarks.categories.show', [
            'bookmarks' => $bookmarks,
            'tag' => $tag
        ]);
    }
}
