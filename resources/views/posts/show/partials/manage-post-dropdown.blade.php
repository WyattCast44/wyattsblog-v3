<div class="absolute top-[-10px] right-[-10px] group" x-data="{ open: false }">
                
    <button type="button" x-on:click="open=!open" id="user-profile-button" class="px-2 py-1 text-sm bg-gray-100 rounded-full focus:outline-none ring-offset-2 ring-offset-gray-200 group-focus:ring-purple-500 focus:ring-purple-500 ring-1 ring-gray-400">
        <span class="sr-only">Manage post menu</span>
        <x-icon-pencil-alt class="inline-block w-5 h-5 text-gray-500 bg-gray-100 rounded-full" /> Manage
    </button>

    <div x-cloak x-show.transition="open" x-on:click.away="open=false" x-on:keydown.escape.window="open=false" x-on:focusout="open=false" class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-400 divide-y divide-gray-100 rounded shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-profile-button" tabindex="-1">

        <div class="py-2.5">
            <nav class="flex flex-col">
                    
                <a href="{{ route('posts.edit', $post) }}" class="px-3.5 py-1.5 hover:bg-gray-200 hover:no-underline w-full focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-purple-500 font-semibold text-left">
                    Edit
                </a>

                @if ($post->published)
                    <button wire:click="unpublish" class="px-3.5 py-1.5 hover:bg-gray-200 hover:no-underline w-full focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-purple-500 font-semibold text-left hover:text-purple-500">
                        Unpublish
                    </button>
                @else
                    <button wire:click="publish" class="px-3.5 py-1.5 hover:bg-gray-200 hover:no-underline w-full focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-purple-500 font-semibold text-left hover:text-purple-500">
                        Publish
                    </button>
                @endif

                <button wire:click="delete" class="px-3.5 py-1.5 hover:bg-gray-200 hover:no-underline w-full focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-purple-500 font-semibold text-left hover:text-purple-500">
                    Delete Post
                </button>

            </nav>
        </div>
        
    </div>

</div>