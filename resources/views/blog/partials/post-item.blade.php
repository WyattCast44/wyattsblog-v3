<li class="w-full py-10 space-y-3">

    <nav class="space-x-1">

        @auth
            <span class="px-2 py-1 text-xs text-gray-500 uppercase border border-gray-400 select-none rounded {{ ($post->published) ? 'bg-green-100' : 'bg-yellow-100' }}">
                {{ ($post->published) ? 'Published' : 'Draft' }}
            </span>
        @endauth
        
        @forelse($post->tags as $tag)
            <a href="{{ route('blog.categories.show', $tag) }}" class="px-2 py-1 text-xs text-gray-500 uppercase border border-gray-400 rounded hover:bg-purple-200 hover:no-underline">
                {{ $tag->name }}
            </a>
        @empty
        @endforelse
        
    </nav>

    <a href="{{ route('posts.show', $post) }}" class="inline-block text-xl font-semibold">{{ $post->title }}</a>

    <p>
        {{ Str::limit($post->excerpt, 255, '...') }}
    </p>

    <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center group">
        Read More <x-icon-arrow-circle-right class="w-4 h-4 ml-1 text-gray-500 group-hover:text-purple-500" />
    </a>

</li>