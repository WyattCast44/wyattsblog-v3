<?php

namespace App\Http\Controllers\Bookmarks;

use App\Models\Tag;
use App\Models\Bookmark;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function React\Promise\reduce;

class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create', 'store']);
    }

    public function index()
    {
        $bookmarks = Bookmark::processed()
            ->with(['tags'])
            ->latest()
            ->get();

        return view('bookmarks.index', [
            'bookmarks' => $bookmarks,
        ]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('bookmarks.create.index', [
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => ['required', 'url'],
            'tags' => ['nullable', 'string'],
        ]);

        $bookmark = Bookmark::firstOrCreate([
            'url_hash' => md5($request->url),
        ], [
            'url' => $request->url,
            'url_hash' => md5($request->url),
            'status' => Bookmark::$states['waiting'],
        ]);

        if($request->tags != null) {
        
            $tags = collect(json_decode($request->tags))->pluck('value')->toArray();

            $tags = collect($tags)->map(function($tag) {
    
                return Tag::firstOrCreate([
                    'name' => $tag,
                    'slug' => Str::slug($tag),
                ]);
    
            });

            $bookmark->tags()->sync($tags->pluck('id'));
        }

        return redirect()->route('bookmarks.index');
    }
}
