@extends('posts.show.layout')

@section('page')

    <div>

        <article class="relative md:p-10">

            @auth
                @include('posts.show.partials.manage-post-dropdown')
            @endauth

            <div class="p-5 mb-6 bg-gray-200 rounded-lg md:mb-12 md:p-10">

                <div class="max-w-xl space-y-5 md:space-y-10 lg:mx-auto">

                    <h1 class="text-3xl font-black text-center text-gray-700 md:text-5xl">
                        {{ $post->title }}
                    </h1>
            
                    <p class="font-mono text-sm md:text-base">
                        {{ $post->excerpt }}
                    </p>
            
                </div>

            </div>

            <x-markdown class="max-w-2xl mx-auto prose prose-lg prose-purple" anchors>
                {!! $post->content !!}
            </x-markdown>

        </article>

        @env('production')
            
            <section class="max-w-2xl py-5 mx-auto border-t-4 border-gray-400 border-dashed">

                <p class="hidden"><a class="hidden" name="comments"></a></p>

                <div>
                    <script src="https://utteranc.es/client.js"
                    repo="WyattCast44/wyattsblog-v3"
                    issue-term="pathname"
                    theme="github-light"
                    label="comment"
                    crossorigin="anonymous"
                    async></script>
                </div>

            </section>

        @endenv
        
    </div>

@endsection