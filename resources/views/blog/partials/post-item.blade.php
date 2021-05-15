<li class="w-full md:space-y-3 space-y-1.5 {{ ($loop->index == 0) ? 'pb-5 md:pb-10' : 'py-5 md:py-10' }}">

    <nav class="space-x-1">

        @auth
            <span class="md:px-2 px-1.5 py-0.5 md:py-1 text-xs text-gray-500 uppercase border border-gray-400 select-none rounded {{ ($post->published) ? 'bg-green-100' : 'bg-yellow-100' }}">
                {{ ($post->published) ? 'Published' : 'Draft' }}
            </span>
        @endauth
        
        @forelse($post->tags as $tag)
            <a href="{{ route('blog.categories.show', $tag) }}" class="md:px-2 px-1.5 py-0.5 md:py-1 text-xs text-gray-500 uppercase border border-gray-400 rounded hover:bg-purple-200 hover:no-underline">
                {{ $tag->name }}
            </a>
        @empty
        @endforelse
        
    </nav>

    <a href="{{ route('posts.show', $post) }}" class="inline-block text-xl font-semibold">{{ $post->title }}</a>

    <p class="text-sm md:text-base">
        {{ Str::limit($post->excerpt, 255, '...') }}
    </p>

    <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center text-sm group md:text-base">
        Read More <x-icon-arrow-circle-right class="w-3 h-3 ml-1 text-gray-500 md:w-4 md:h-4 group-hover:text-purple-500" />
    </a>

</li>