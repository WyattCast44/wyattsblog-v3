@extends('layouts.app')

@section('content')

    <div class="h-full max-w-4xl mx-5 mt-5 md:mt-10 lg:mx-auto">

        <div class="flex flex-col w-full h-full pt-5 bg-white border border-gray-400 rounded-t-sm shadow-lg md:pt-10">

            <div class="flex-grow px-5 md:px-10">

                {{ $slot }}

            </div>

            <div class="h-20 mt-10 md:h-40 bg-gradient-to-b from-white to-cool-gray-100 bg-opacity-60 print:hidden"></div>

        </div>

    </div>

@endsection