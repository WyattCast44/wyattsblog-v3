@extends('blog.layout')

@section('page')
    
    <div class="max-w-xl pt-10 mx-4 space-y-10 lg:mx-auto">

        <h1 class="text-5xl font-black text-center text-gray-700">
            My Blog Posts
        </h1>

        <p class="font-mono">
            The web is as weird, varied, and wonderful as you make it. My interests are as mixed as a bag of trail mix, pick out the pieces you enjoy and leave the rest for others to partake.
        </p>

    </div>

    <div class="max-w-xl mx-4 mt-10 mb-16 lg:mx-auto">

        <ul class="flex flex-col divide-y">
            @each('blog.partials.post-item', $posts, 'post')
        </ul>

    </div>    

@endsection
