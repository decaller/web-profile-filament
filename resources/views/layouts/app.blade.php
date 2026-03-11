<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" data-theme="winter">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! seo() !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-base-100 text-base-content selection:bg-primary selection:text-primary-content">

    @include('partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
