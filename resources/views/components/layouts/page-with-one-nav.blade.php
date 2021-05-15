@extends('layouts.app')

@section('content')

    <div class="h-full max-w-4xl mx-4 mt-10 lg:mx-auto">

        <div class="px-4 py-2.5 mx-10 bg-gray-200 bg-opacity-75 border border-b-0 border-gray-400 shadow-sm rounded-t-sm print:hidden">

            <nav class="flex items-center w-full space-x-4">
                
               {{ $nav }}

            </nav>

        </div>

        <div class="flex flex-col w-full h-full pt-10 bg-white border border-gray-400 rounded-t-sm shadow-lg">

            <div class="flex-grow px-10">

                {{ $slot }}

            </div>

            <div class="h-40 mt-10 bg-gradient-to-b from-white to-cool-gray-100 bg-opacity-60 print:hidden"></div>

        </div>

    </div>

@endsection