@extends('layouts.app')

@section('content')

    <div class="h-full max-w-4xl mx-5 mt-5 md:mt-10 lg:mx-auto">

        <div class="px-2 md:px-4 md:py-2.5 py-1.5 mx-10 md:mx-20 bg-gray-200 bg-opacity-75 border border-b-0 border-gray-400 shadow-sm rounded-t-sm print:hidden">

            <nav class="flex items-center w-full space-x-4">
                
               {{ $firstNav }}

            </nav>

        </div>

        <div class="px-2 md:px-4 md:py-2.5 py-1.5 mx-5 md:mx-10 bg-gray-200 bg-opacity-75 border border-b-0 border-gray-400 shadow-sm rounded-t-sm print:hidden">

            <nav class="flex items-center w-full space-x-4">
                
               {{ $secondNav }}

            </nav>

        </div>

        <div class="flex flex-col w-full h-full pt-5 bg-white border border-gray-400 rounded-t-sm shadow-lg md:pt-10">

            <div class="flex-grow px-5 md:px-10">

                {{ $slot }}

            </div>

            <div class="h-20 mt-10 md:h-40 bg-gradient-to-b from-white to-cool-gray-100 bg-opacity-60 print:hidden"></div>

        </div>

    </div>

@endsection