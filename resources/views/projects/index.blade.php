<x-layouts.page-with-one-nav>

    <x-slot name="nav">
        
        <a href="#" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm">
            <x-icon-status-online class="w-4 h-4 mr-2" /> Active Projects
        </a>

        <a href="#" class="flex items-center font-semibold rounded hover:no-underline hover:bg-gray-300 px-2.5 py-1.5 hover:text-gray-900 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-gray-200 focus:bg-gray-300 focus:no-underline focus:text-gray-900 text-sm">
            <x-icon-archive class="w-4 h-4 mr-2" /> Archived Projects
        </a>

    </x-slot>

    <div class="max-w-xl pt-10 mx-4 space-y-10 lg:mx-auto">

        <h1 class="text-5xl font-black text-center text-gray-700">
            My Projects
        </h1>
    
        <blockquote class="py-4 pl-10 font-mono text-lg text-purple-800 bg-purple-200 border-l-4 border-purple-400">
            <p>Realize that everything connects to everything else</p>
            <p>- Leonardo da Vinci</p>
        </blockquote>

    </div>

    <div class="max-w-xl mx-4 mt-10 mb-16 lg:mx-auto">

        <ul class="flex flex-col divide-y">
            
        </ul>

    </div>
    

</x-layouts.page-with-one-nav>