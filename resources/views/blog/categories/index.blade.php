@extends('blog.layout')

@section('page')

    <div class="max-w-xl space-y-5 md:space-y-10 md:mx-auto md:pt-10">

        <h1 class="text-3xl font-black text-center text-gray-700 md:text-5xl">
            Blog Categories
        </h1>

    </div>

    <div class="max-w-xl mx-auto mt-5 md:mb-16 md:mt-10 md:mx-auto md:my-10">
        
        <ul class="grid grid-cols-2 gap-4 md:grid-cols-3">
            @foreach ($tags as $tag)
                <li class="relative p-12 border border-gray-400 rounded">
                    
                    <a href="{{ route('blog.categories.show', $tag) }}" class="absolute flex justify-center inset-0 items-center font-semibold rounded hover:no-underline hover:bg-gray-200 px-2.5 py-1.5 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-200 focus:no-underline focus:text-gray-900">
                        {{ $tag->name }}
                    </a>

                </li>
            @endforeach
        </ul>

    </div>

@endsection