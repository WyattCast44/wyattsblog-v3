@extends('blog.layout')

@section('page')
    
    <div class="max-w-xl space-y-5 md:space-y-10 md:mx-auto md:pt-10">

        <h1 class="text-3xl font-black text-center text-gray-700 md:text-5xl">
            My Blog Posts
        </h1>

        <p class="font-mono text-sm md:text-base">
            The web is as weird, varied, and wonderful as you make it. My interests are as mixed as a bag of trail mix, pick out the pieces you enjoy and leave the rest for others to partake.
        </p>

    </div>

    <div class="max-w-xl mt-5 md:mb-16 md:mt-10 md:mx-auto">

        <ul class="flex flex-col divide-y divide-gray-300">
            @foreach ($posts as $post)
                @include('blog.partials.post-item')
            @endforeach
        </ul>

    </div>    

@endsection
