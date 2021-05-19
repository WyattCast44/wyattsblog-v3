@extends('bookmarks.create.layout')

@push('head:styles')
    <link rel="stylesheet" href="{{ asset('css/vendor/tagify.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/vendor/tagify.js') }}" defer></script>
@endpush

@section('page')

    <div>

        <form action="{{ route('bookmarks.store') }}" method="POST">

            @csrf

            <div class="max-w-2xl pt-10 mx-4 space-y-10 lg:mx-auto">

                <h1 class="text-5xl font-black text-center text-gray-700">
                    Add Bookmark
                </h1>
            
            </div>
            
            <div class="max-w-2xl mx-4 mt-10 mb-16 lg:mx-auto">
            
                <label for="url" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Bookmark URL
                    </span>
                    
                    <input type="url" id="url" name="url" class="rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300" autocomplete="off" spellcheck="false" required>
            
                    <x-errors.inline key="url" />
            
                </label>
            
                <label for="tags" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Tags
                    </span>
                    
                    <div class="w-full">
                        <input type="text" id="tag-input" name="tags" placeholder="Add or select some tags" class="w-full border-gray-400 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300">
                    </div>
            
                    <x-errors.inline key="tags" />

                    @push('scripts')
                        <script>
                            document.addEventListener(":load", function(event) {
                                
                                var input = document.getElementById('tag-input')
                                
                                var tagify = new Tagify(input, {
                                    whitelist : [
                                        @foreach($tags as $tag)
                                            '{{ $tag->name }}',
                                        @endforeach
                                    ]                            
                                });

                            });
                        </script>
                    @endpush
            
                </label>     
            
            </div>

            <div>
                <button type="submit">Save Bookmark</button>
            </div>

        </form>

    </div>

@endsection