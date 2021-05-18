@extends('bookmarks.layout')

@section('page')

    <div class="max-w-xl pt-10 mx-4 space-y-10 lg:mx-auto">

        <h1 class="text-5xl font-black text-center text-gray-700">
            My Bookmarks
        </h1>

        <p class="font-mono">
            There are so many amazing websites and resources on the web, too many to keep track of! I'm done losing the gems I find, I'm going to keep track here. Maybe you'll find something useful... maybe not 🤷‍♂️
        </p>

    </div>

    <div class="max-w-xl mx-auto mt-16 mb-10">

        <ul class="flex flex-col divide-y divide-gray-300">
            @foreach ($bookmarks as $bookmark)
                @include('bookmarks.partials.bookmark-item')
            @endforeach
        </ul>

    </div>

@endsection