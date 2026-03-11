@extends('layouts.app')
@section('title', $activity->title)
@section('content')
<article class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('activities.index') }}" class="btn btn-ghost btn-sm mb-6">&larr; Back to Activities</a>
        <h1 class="text-4xl font-bold tracking-tight text-base-content sm:text-5xl mb-4">{{ $activity->title }}</h1>
        <p class="text-base-content/60 text-lg">Activity Date: {{ \Carbon\Carbon::parse($activity->date)->format('F j, Y') }}</p>
    </div>

    @if($activity->content)
    <div class="prose prose-lg max-w-none text-base-content mb-12">
        {!! $activity->content !!}
    </div>
    @endif

    @if($activity->gallery && is_array($activity->gallery) && count($activity->gallery) > 0)
    <h3 class="text-2xl font-bold mb-6 border-b border-base-200 pb-2">Photo Gallery</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($activity->gallery as $photo)
            <div class="rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow cursor-pointer border border-base-200">
                <img src="{{ Storage::url($photo) }}" alt="Gallery Image" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300" />
            </div>
        @endforeach
    </div>
    @endif
</article>
@endsection
