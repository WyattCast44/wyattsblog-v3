<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {
        if(!$request->hasFile('image')) {
            return response([
                'error' => 'noFileGiven'
            ], 400);
        }

        $this->validate($request, [
            'image' => ['required', 'image', 'max:10000']
        ]);

        $path = 'storage/' . $request->file('image')->storePublicly('media', 'public');

        return response([
            'data' => [
                'filePath' => $path,
            ]
        ], 200);
    }
}
