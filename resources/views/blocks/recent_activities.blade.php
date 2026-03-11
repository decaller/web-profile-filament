@php
    $activities = \App\Models\Activity::orderBy('date', 'desc')->take($data['count'] ?? 3)->get();
@endphp
<div class="py-16 bg-base-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-base-content sm:text-4xl">{{ $data['heading'] ?? 'Recent Activities' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($activities as $activity)
            <div class="card bg-base-100 shadow-xl overflow-hidden hover:shadow-2xl transition-shadow border border-base-200">
                @if($activity->gallery && is_array($activity->gallery) && count($activity->gallery) > 0)
                    <figure><img src="{{ Storage::url($activity->gallery[0]) }}" alt="{{ $activity->title }}" class="h-48 w-full object-cover" /></figure>
                @else
                    <div class="h-48 bg-base-200 flex items-center justify-center text-base-content/30"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                @endif
                <div class="card-body">
                    <p class="text-sm text-primary font-medium">{{ \Carbon\Carbon::parse($activity->date)->format('F j, Y') }}</p>
                    <h2 class="card-title text-xl"><a href="{{ route('activities.show', $activity->slug) }}" class="hover:text-primary transition-colors">{{ $activity->title }}</a></h2>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('activities.show', $activity->slug) }}" class="btn btn-outline btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('activities.index') }}" class="btn btn-outline btn-primary">View All Activities</a>
        </div>
    </div>
</div>
