@php
    $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->take($data['count'] ?? 3)->get();
@endphp
<div class="py-16 bg-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-base-content sm:text-4xl">{{ $data['heading'] ?? 'What People Say' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="card bg-base-100 shadow-lg border border-base-200">
                <div class="card-body">
                    <p class="text-base-content/80 text-lg italic mb-6">"{{ Str::limit($testimonial->content, 200) }}"</p>
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
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('testimonials.index') }}" class="btn btn-outline btn-primary">Read More Testimonials</a>
        </div>
    </div>
</div>
