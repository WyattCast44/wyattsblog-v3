<?php

namespace App\Http\Controllers\API;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => ['required', 'url'],
        ]);

        $bookmark = Bookmark::firstOrCreate([
            'url_hash' => md5($request->url),
        ]);
        
        $bookmark->update([
            'url' => $request->url,
        ]);

        return response('',  Response::HTTP_CREATED);
    }
}
