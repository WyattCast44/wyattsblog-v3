
@extends('posts.edit.layout')

@push('head:styles')
    <link rel="stylesheet" href="{{ asset('css/vendor/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/easymde.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/vendor/tagify.js') }}" defer></script>
    <script src="{{ asset('js/vendor/easymde.js') }}" defer></script>
@endpush

@section('page')
    
    <div>

        <form action="{{ route('posts.update', $post) }}" method="POST">

            @csrf

            <div class="max-w-2xl pt-10 mx-4 space-y-10 lg:mx-auto">

                <h1 class="text-5xl font-black text-center text-gray-700">
                    Create Blog Post
                </h1>
            
            </div>
            
            <div class="max-w-2xl mx-4 mt-10 mb-16 lg:mx-auto">
            
                <label for="title" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Post Title
                    </span>
                    
                    <input type="text" id="title" name="title" placeholder="Your post title" class="rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300" autocomplete="off" spellcheck="false" required value="{{ $post->title }}">
            
                    <x-errors.inline key="post.title" />
            
                </label>
            
                <label for="tags" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Post Tags
                    </span>
                    
                    <div class="w-full">
                        <input type="text" id="tag-input" name="tags" placeholder="Add or select some tags" class="w-full border-gray-400 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300">
                    </div>
            
                    <x-errors.inline key="tags" />

                    @push('scripts')
                        <script>
                            document.addEventListener("DOMContentLoaded", function(event) {
                                
                                var input = document.getElementById('tag-input')
                                
                                var tagify = new Tagify(input, {
                                    whitelist : [
                                        @foreach($tags as $tag)
                                            '{{ $tag->name }}',
                                        @endforeach
                                    ]                            
                                });

                                tagify.addTags([
                                    @foreach($post->tags as $tag)
                                        '{{ $tag->name }}',
                                    @endforeach
                                ]);
                                
                            });
                        </script>
                    @endpush
            
                </label>     

                <label for="excerpt" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Post Excerpt
                    </span>
                    
                    <textarea id="excerpt" name="excerpt" placeholder="A quick recap of what this post is about, 240 chars or less" class="border-gray-400 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300">{{ $post->excerpt }}</textarea>
            
                    <x-errors.inline key="excerpt" />
            
                </label>     
                
                <label for="content" class="flex flex-col mt-8 space-y-2">
            
                    <span class="inline-flex font-semibold">
                        Post Content
                    </span>
                    
                    <textarea name="content" id="content">{{ $post->content }}</textarea>
                    
                    <x-errors.inline key="content" />
            
                </label>

                @push('scripts')
                    
                    <script>
                        
                        document.addEventListener("DOMContentLoaded", function() {

                            window.easyMDE = new EasyMDE({ 
                                element: document.querySelector("#content"), ... {
                                    'minHeight': '300px',
                                    'forceSync': true,
                                    'previewClass': 'prose prose-purple bg-white p-10 max-w-none z-50',
                                    'autoDownloadFontAwesome': true,
                                    'uploadImage': true,
                                    'imageMaxSize': (1024 * 1024 * 5),
                                    'imageUploadEndpoint': '{{ route('posts.media.upload') }}',
                                }})
                            
                        })

                    </script>

                @endpush
            
            </div>

            <div>
                <button type="submit">Save Post</button>
            </div>

        </form>

    </div>

@endsection