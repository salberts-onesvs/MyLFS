<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyLFS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">

    {{-- Navbar --}}
    @include('inc.navbar')

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

@yield('scripts')

</body>
</html>
