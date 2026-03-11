@extends('layouts.app')
@section('title', 'Blog & News')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl">Blog & News</h1>
        <p class="mt-4 text-lg text-base-content/70">Stay updated with our latest thoughts, events, and announcements.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <div class="card bg-base-100 shadow-xl overflow-hidden hover:shadow-2xl transition-shadow border border-base-200">
                @if($post->image)
                    <figure><img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="h-48 w-full object-cover" /></figure>
                @endif
                <div class="card-body">
                    <p class="text-sm text-primary font-medium">{{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}</p>
                    <h2 class="card-title text-xl"><a href="{{ route('blogs.show', $post->slug) }}" class="hover:text-primary transition-colors">{{ $post->title }}</a></h2>
                    <p class="text-base-content/70 line-clamp-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('blogs.show', $post->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-base-content/50">No posts found.</div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
@endsection
