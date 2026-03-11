@php
    $posts = \App\Models\Post::orderBy('published_at', 'desc')->take($data['count'] ?? 3)->get();
@endphp
<div class="py-16 bg-base-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-base-content sm:text-4xl">{{ $data['heading'] ?? 'Latest News' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
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
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('blogs.index') }}" class="btn btn-outline btn-primary">View All News</a>
        </div>
    </div>
</div>
