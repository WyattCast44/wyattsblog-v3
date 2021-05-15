@extends('layouts.app')

@section('content')

    <div class="h-full max-w-4xl mx-4 mt-10 lg:mx-auto">

        <div class="flex flex-col w-full h-full pt-10 bg-white border border-gray-400 rounded-t-sm shadow-lg">

            <div class="flex-grow px-10">

                {{ $slot }}

            </div>

            <div class="h-40 mt-10 bg-gradient-to-b from-white to-cool-gray-100 bg-opacity-60 print:hidden"></div>

        </div>

    </div>

@endsection