<header class="fixed top-0 z-50 w-full bg-gray-200 border-b border-gray-400 shadow-inner print:hidden">

    <!-- colorband -->
    <div class="h-2 bg-gradient-to-tr from-purple-300 to-purple-400"></div>

    <!-- header nav -->
    <div class="relative flex items-center justify-between px-3 md:px-5 py-5 h-[76px]">

        <!-- logo -->
        <a href="{{ route('welcome') }}" class="relative w-8 h-8 transform focus:outline-none focus:scale-110">
            <span class="sr-only">Go back to the homepage</span>
            <x-icon-me-wizard class="absolute top-[-5px] md:top-[-12px] h-10 md:h-14" alt="My Octocat!" />
        </a>

        <!-- main desktop nav -->
        <div class="hidden w-full max-w-4xl md:block">

            <nav class="flex items-center w-full space-x-4">
                
                <a href="{{ route('blog.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900">
                    <x-icon-newspaper class="w-5 h-5 mr-2" /> Blog
                </a>

                <a href="{{ route('projects.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900">
                    <x-icon-sparkles class="w-5 h-5 mr-2" /> Projects
                </a>
                
                {{-- <a href="{{ route('timeline.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900">
                    <x-icon-collection class="w-5 h-5 mr-2" /> Timeline
                </a> --}}

                <a href="{{ route('bookmarks.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900">
                    <x-icon-link class="w-5 h-5 mr-2" /> Bookmarks
                </a>

                {{-- <div class="relative" x-data="{ open: false }">

                    <button x-on:click="open=!open" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900">
                        <x-icon-menu class="w-5 h-5 mr-2" /> Other
                    </button>

                    <div 
                        x-cloak
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        x-on:click.away="open=false"
                        class="absolute z-10 w-screen max-w-xs px-2 mt-3 transform -translate-x-1/2 left-1/2 sm:px-0">

                        <div class="overflow-hidden border border-gray-400 rounded shadow-lg ring-1 ring-black ring-opacity-5">

                            <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">

                                <a href="{{ route('bookmarks.index') }}" class="block p-3 -m-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-200 hover:no-underline">
                                    <p class="text-base font-medium text-gray-900">
                                        Bookmarks
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        All sorts of good links from the internet
                                    </p>
                                </a>

                            </div>

                        </div>

                    </div>

                </div> --}}               

            </nav>

        </div>

        <!-- profile dropdown -->
        <div x-data="{ open: false }" class="relative hidden w-10 h-10 group md:block">
            
            @auth
            
               <button type="button" x-on:click="open=!open" id="user-profile-button" class="bg-gray-200 rounded-full focus:outline-none ring-offset-2 ring-offset-gray-200 group-focus:ring-purple-500 focus:ring-purple-500 ring-2 ring-gray-400">
                    <span class="sr-only">Profile Menu</span>
                    <img class="inline-block bg-gray-100 rounded-full w-9 h-9" src="{{ asset('me.jfif') }}" alt="Me">
                </button>

                <div x-cloak x-show.transition="open" x-on:click.away="open=false" x-on:keydown.escape.window="open=false" x-on:focusout="open=false" class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-profile-button" tabindex="-1">
                    
                    <div class="py-3 px-3.5 flex flex-col border-b border-gray-200">
                        <span class="text-xs text-gray-400">Hi 👋 my name is</span>
                        <span class="text-base font-semibold">Wyatt Castaneda</span>
                    </div>

                    <div class="py-2.5">
                        <nav class="flex flex-col">
                                
                            <button type="submit" form="logout-form" class="px-3.5 py-1.5 hover:bg-gray-200 hover:no-underline w-full focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-purple-500 font-semibold text-left">
                                Logout
                            </button>

                        </nav>
                    </div>
                    
                </div>

            @endauth

        </div>

    </div>

</header>