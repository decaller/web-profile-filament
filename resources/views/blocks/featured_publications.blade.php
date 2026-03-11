@php
    $publications = \App\Models\Publication::latest()->take($data['count'] ?? 3)->get();
@endphp
<div class="py-16 bg-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-base-content sm:text-4xl">{{ $data['heading'] ?? 'Featured Publications' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($publications as $publication)
            <div class="card bg-base-100 shadow-xl overflow-hidden hover:shadow-2xl transition-shadow border border-base-300">
                <div class="card-body">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="text-sm text-base-content/50 font-medium">{{ $publication->created_at->format('F j, Y') }}</p>
                    <h2 class="card-title text-xl"><a href="{{ route('publications.show', $publication->slug) }}" class="hover:text-primary transition-colors">{{ $publication->title }}</a></h2>
                    <p class="text-base-content/70 line-clamp-3">{{ Str::limit(strip_tags($publication->description), 100) }}</p>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ Storage::url($publication->document_file) }}" target="_blank" class="btn btn-primary btn-sm">Download</a>
                        <a href="{{ route('publications.show', $publication->slug) }}" class="btn btn-ghost btn-sm">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('publications.index') }}" class="btn btn-outline btn-primary">Browse Publications</a>
        </div>
    </div>
</div>
