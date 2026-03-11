@extends('layouts.app')
@section('title', $post->title)
@section('content')
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('blogs.index') }}" class="btn btn-ghost btn-sm mb-6">&larr; Back to Blog</a>
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl mb-4">{{ $post->title }}</h1>
        <p class="text-base-content/60 text-lg">Published on {{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}</p>
    </div>

    @if($post->image)
        <figure class="mb-10 rounded-xl overflow-hidden shadow-lg border border-base-200">
            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]" />
        </figure>
    @endif

    <div class="prose prose-lg max-w-none text-base-content">
        {!! $post->content !!}
    </div>
</article>
@endsection
