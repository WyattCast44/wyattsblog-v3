<x-layouts.page-with-one-nav>

    <x-slot name="nav">
        
        <a href="{{ route('projects.index') }}" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm">
            <x-icon-arrow-circle-left class="w-4 h-4 mr-2" /> Back to Projects
        </a>

    </x-slot>

    @yield('page')    

</x-layouts.page-with-one-nav>