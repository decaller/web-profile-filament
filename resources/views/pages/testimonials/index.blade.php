@extends('layouts.app')
@section('title', 'Testimonials')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl">What People Say</h1>
        <p class="mt-4 text-lg text-base-content/70">Read stories from our students, parents, and alumni.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($testimonials as $testimonial)
            <div class="card bg-base-100 shadow-lg border border-base-200">
                <div class="card-body">
                    <p class="text-base-content/80 text-lg italic mb-6">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center gap-4 mt-auto">
                        @if($testimonial->avatar)
                            <div class="avatar">
                                <div class="w-12 h-12 rounded-full">
                                    <img src="{{ Storage::url($testimonial->avatar) }}" alt="{{ $testimonial->author_name }}" />
                                </div>
                            </div>
                        @else
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-12 h-12">
                                    <span class="text-xl">{{ substr($testimonial->author_name, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <div>
                            <h4 class="font-bold text-base-content">{{ $testimonial->author_name }}</h4>
                            @if($testimonial->author_title)
                                <p class="text-sm text-base-content/60">{{ $testimonial->author_title }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-base-content/50">No testimonials found.</div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
