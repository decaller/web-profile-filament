<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" data-theme="winter">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $settings = \App\Models\Setting::first();
    @endphp
    <title>{{ $page->title }} - {{ $settings?->site_title ?? config('app.name', 'School Profile') }}</title>
    @if($settings?->site_favicon)
        <link rel="icon" href="{{ Storage::url($settings->site_favicon) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-base-100 text-base-content selection:bg-primary selection:text-primary-content">

    @include('partials.header')

    <main class="min-h-screen">
        @if(is_array($page->content) && count($page->content) > 0)
            @foreach ($page->content as $block)
                @if (view()->exists('blocks.' . $block['type']))
                    @include('blocks.' . $block['type'], ['data' => $block['data']])
                @else
                    <div class="py-8 text-center text-red-500">
                        Block <strong>{{ $block['type'] }}</strong> not found.
                    </div>
                @endif
            @endforeach
        @else
            <div class="py-20 text-center text-slate-500">
                This page has no content yet.
            </div>
        @endif
    </main>

    @include('partials.footer')

</body>

</html>