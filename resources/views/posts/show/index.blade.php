<div>

    <article class="relative p-10">

        @auth
            @include('posts.show.partials.manage-post-dropdown')
        @endauth

        <div class="p-10 mb-12 bg-gray-200 rounded-lg">

            <div class="max-w-xl mx-4 space-y-10 lg:mx-auto">

                <h1 class="text-5xl font-black text-center text-gray-700">
                    {{ $post->title }}
                </h1>
        
                <p class="font-mono">
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