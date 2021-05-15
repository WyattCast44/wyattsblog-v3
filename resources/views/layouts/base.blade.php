<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="description" content="{{ ($pageMeta && isset($pageMeta['description'])) ? $pageMeta['description'] : 'Wyatt Castaneda\'s personal website'  }}">
    <meta name="keywords" content="Wyatt Castaneda, Wyatt Cast, Wyattcastaned44, WyattCast44">
    <title>{{ ($pageMeta) ? $pageMeta['title'] . ' - ' : ''  }}{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" rel="preload">

    <!-- Styles -->
    <style>[x-cloak] {display: none !important;}</style>
    <livewire:styles />
    @stack('head:styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <livewire:scripts />
    @stack('head:scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="{{ mix('js/console.js') }}" defer></script> --}}

</head>
<body class="antialiased text-gray-700 bg-gray-50 @stack('bodyClasses')" @stack('bodyAttributes')>

    @yield('body')

    <!-- Scripts -->
    @stack('scripts')
    
</body>
</html>