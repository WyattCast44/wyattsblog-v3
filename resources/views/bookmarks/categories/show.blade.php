@extends('bookmarks.layout')

@section('page')

    <div class="max-w-xl pt-8 mx-4 space-y-10 lg:mx-auto">

        <h1 class="text-5xl font-black text-center text-gray-700">
            <span class="mb-2 text-lg font-semibold">Bookmark Category</span> <br> {{ $tag->name }}
        </h1>

    </div>

    <div class="max-w-xl mx-4 mt-10 mb-16 lg:mx-auto">

        <ul class="flex flex-col divide-y">
            @foreach ($bookmarks as $bookmark)
                @include('bookmarks.partials.bookmark-item')
            @endforeach
        </ul>

    </div>    

@endsection