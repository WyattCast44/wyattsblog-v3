<x-layouts.page-with-one-nav>

    <x-slot name="nav">
        
        <a href="{{ route('blog.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm">
            <x-icon-newspaper class="w-4 h-4 mr-2" /> Posts
        </a>

        <a href="{{ route('blog.categories') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm">
            <x-icon-view-grid class="w-4 h-4 mr-2" /> Categories
        </a>

        @auth
                
            <a href="{{ route('posts.create') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm whitespace-nowrap">
                <x-icon-document-plus class="w-4 h-4 mr-2" /> Create Post
            </a>

        @endauth

    </x-slot>

    @yield('page')    

</x-layouts.page-with-one-nav>