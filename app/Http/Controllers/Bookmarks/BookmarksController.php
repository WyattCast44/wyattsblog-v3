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
        view()->share('pageMeta', [
            'title' => 'My Bookmarks',
            'description' => 'There are so many amazing websites and resources on the web, too many to keep track of! I\'m done losing the gems I find, I\'m going to keep track here.',
        ]);

        $query = Bookmark::processed()
            ->with(['tags']);

        // Do not include private bookmarks if not logged in
        if(! auth()->check()) {
            $query = $query->public();
        }
        
        $bookmarks = $query->latest()->get();

        return view('bookmarks.index', [
            'bookmarks' => $bookmarks,
        ]);
    }

    public function create()
    {
        view()->share('pageMeta', [
            'title' => 'Add Bookmark'
        ]);

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

            $public = true;
        
            $tags = collect(json_decode($request->tags))->pluck('value')->toArray();

            $tags = collect($tags)->map(function($tag) use (&$public) {
    
                $tag = Tag::firstOrCreate([
                    'name' => $tag,
                    'slug' => Str::slug($tag),
                ]);

                if(! $tag->public) {
                    $public = false;
                }
    
                return $tag;
            });

            $bookmark->update([
                'public' => $public
            ]);

            $bookmark->tags()->sync($tags->pluck('id'));
        }

        return redirect()->route('bookmarks.index');
    }
}
