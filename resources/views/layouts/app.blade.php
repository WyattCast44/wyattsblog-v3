@extends('layouts.base')

@push('bodyClasses', 'flex flex-col h-screen')

@section('body')

    @include('layouts.partials.navbar')
    
    <main class="flex-grow mt-[85px]">
        @yield('content')
    </main>
    
    <form action="{{ route('logout') }}" method="post" x-cloak class="hidden" id="logout-form">
        @csrf
        <button type="submit" class="hidden">Logout</button>
    </form>

@endsection