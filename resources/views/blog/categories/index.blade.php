@extends('blog.layout')

@section('page')

    <div class="max-w-xl pt-10 mx-4 space-y-10 lg:mx-auto">

        <h1 class="text-5xl font-black text-center text-gray-700">
            Blog Categories
        </h1>

    </div>

    <ul class="grid max-w-xl grid-cols-3 gap-4 mx-auto my-10">
        @foreach ($tags as $tag)
            <li class="relative p-12 border border-gray-400 rounded">
                
                <a href="{{ route('blog.categories.show', $tag) }}" class="absolute flex justify-center inset-0 items-center font-semibold rounded hover:no-underline hover:bg-gray-200 px-2.5 py-1.5 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-200 focus:no-underline focus:text-gray-900">
                    {{ $tag->name }}
                </a>

            </li>
        @endforeach
    </ul>

@endsection