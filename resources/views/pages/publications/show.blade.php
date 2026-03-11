@extends('layouts.app')
@section('title', $publication->title)
@section('content')
<article class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('publications.index') }}" class="btn btn-ghost btn-sm mb-6">&larr; Back to Publications</a>
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl mb-4">{{ $publication->title }}</h1>
        <p class="text-base-content/60 text-lg">Published on {{ $publication->created_at->format('F j, Y') }}</p>
    </div>

    <div class="flex flex-col md:flex-row gap-8 mb-12">
        <div class="md:w-2/3 prose prose-lg max-w-none text-base-content">
            {!! $publication->description !!}
        </div>
        <div class="md:w-1/3">
            <div class="card bg-base-200 shadow-md border border-base-300">
                <div class="card-body items-center text-center">
                    <svg class="w-16 h-16 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <h3 class="card-title">Download Document</h3>
                    <p class="text-sm text-base-content/70">Click below to access the full publication file.</p>
                    <div class="card-actions mt-4 w-full">
                        <a href="{{ Storage::url($publication->document_file) }}" target="_blank" class="btn btn-primary w-full shadow hover:scale-[1.02] transition-transform">Download File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($publication->gallery && is_array($publication->gallery) && count($publication->gallery) > 0)
    <h3 class="text-2xl font-bold mb-6 border-b border-base-200 pb-2">Gallery</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($publication->gallery as $photo)
            <div class="rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer border border-base-200">
                <img src="{{ Storage::url($photo) }}" alt="Publication Image" class="w-full h-48 object-cover hover:scale-[1.02] transition-transform duration-300" />
            </div>
        @endforeach
    </div>
    @endif
</article>
@endsection
