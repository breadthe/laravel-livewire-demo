<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:200,300,400,500,600,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts.favicon')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.1.2/dist/alpine.js" defer></script>
</head>
<body>
    <div id="app" class="relative" x-data="{'menuIsOpen': false}">
        <!-- overlay -->
        <div class="absolute inset-0 bg-black opacity-50 sm:hidden" x-show="menuIsOpen" x-on:click="menuIsOpen = false">
        </div>

        @include('layouts.nav')

        <main class="" style="min-height: 100vh;">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
