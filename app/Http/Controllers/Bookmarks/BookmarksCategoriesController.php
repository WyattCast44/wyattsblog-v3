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
        })->filter(function($tag) {
            // dont show private tags if not logged in
            return (auth()->check()) ? true : $tag->public;
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

        if(!auth()->check() && ! $tag->public) {
            return abort(404);
        }

        $tag->load('bookmarks');

        $bookmarks = $tag->bookmarks()->latest()->get()->filter(function($bookmark) {
            return $bookmark->hasProcessedSuccessfully();
        })->filter(function($bookmark) {
            // Dont show private bookmarks if not logged in
            return (auth()->check()) ? true : $bookmark->public;
        });;

        return view('bookmarks.categories.show', [
            'bookmarks' => $bookmarks,
            'tag' => $tag
        ]);
    }
}
