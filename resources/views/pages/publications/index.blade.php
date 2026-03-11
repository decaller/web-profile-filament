@extends('layouts.app')
@section('title', 'Publications & Documents')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl">Publications</h1>
        <p class="mt-4 text-lg text-base-content/70">Browse our official documents, magazines, and guides.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($publications as $publication)
            <div class="card bg-base-100 shadow-xl overflow-hidden hover:shadow-2xl transition-shadow border border-base-200">
                <div class="card-body">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="text-sm text-base-content/50 font-medium">{{ $publication->created_at->format('F j, Y') }}</p>
                    <h2 class="card-title text-xl"><a href="{{ route('publications.show', $publication->slug) }}" class="hover:text-primary transition-colors">{{ $publication->title }}</a></h2>
                    <p class="text-base-content/70 line-clamp-3">{{ Str::limit(strip_tags($publication->description), 120) }}</p>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('publications.show', $publication->slug) }}" class="btn btn-outline btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-base-content/50">No publications found.</div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $publications->links() }}
    </div>
</div>
@endsection
