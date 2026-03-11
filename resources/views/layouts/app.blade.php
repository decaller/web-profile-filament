<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" data-theme="winter">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $settings = \App\Models\Setting::first();
    @endphp
    <title>@yield('title', config('app.name', 'School Profile')) - {{ $settings?->site_title ?? config('app.name', 'School Profile') }}</title>
    @if($settings?->site_favicon)
        <link rel="icon" href="{{ Storage::url($settings->site_favicon) }}">
    @endif
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
