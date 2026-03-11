<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title }} - {{ config('app.name', 'School Profile') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-900 selection:bg-indigo-500 selection:text-white">

    {{-- Main Navigation (Placeholder or driven by Menu Builder later) --}}
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-indigo-700">School Profile</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-slate-600 hover:text-indigo-600 font-medium">Home</a>
                    <a href="/about" class="text-slate-600 hover:text-indigo-600 font-medium">About</a>
                    <a href="/admissions" class="text-slate-600 hover:text-indigo-600 font-medium">Admissions</a>
                </div>
            </div>
        </div>
    </nav>

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

    <footer class="bg-slate-900 py-12 text-center text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            &copy; {{ date('Y') }} {{ config('app.name', 'School Profile') }}. All rights reserved.
        </div>
    </footer>

</body>
</html>
