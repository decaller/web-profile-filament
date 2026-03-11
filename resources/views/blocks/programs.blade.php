<section class="py-24 bg-white" id="programs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 tracking-tight">
                {{ $data['heading'] ?? 'Our Academic Excellence' }}
            </h2>
            <div class="w-16 h-1 bg-indigo-600 mx-auto mt-6 rounded-full"></div>
        </div>

        @if(!empty($data['items']))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($data['items'] as $item)
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 flex items-center justify-center rounded-xl mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            @if(!empty($item['icon']))
                                <x-icon name="{{ $item['icon'] }}" class="w-7 h-7" />
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $item['title'] ?? 'Program Title' }}</h3>
                        <p class="text-slate-600 leading-relaxed">
                            {{ $item['description'] ?? 'Program description goes here. Explain the benefits to students.' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-slate-500">No programs added yet.</p>
        @endif
    </div>
</section>
