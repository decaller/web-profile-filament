<section class="py-24 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 tracking-tight">
                {{ $data['heading'] ?? 'Hear From Our Community' }}
            </h2>
        </div>

        @if(!empty($data['items']))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($data['items'] as $item)
                    <div class="bg-white rounded-2xl p-8 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] relative">
                        <svg class="absolute top-6 left-6 w-8 h-8 text-indigo-100" fill="currentColor" viewBox="0 0 32 32"><path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/></svg>
                        <p class="text-lg text-slate-700 font-medium italic mb-8 relative z-10 pl-4">
                            "{{ $item['quote'] ?? 'This school changed our lives.' }}"
                        </p>
                        <div class="flex items-center space-x-4 border-t border-slate-100 pt-6">
                            <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-lg">
                                {{ substr($item['author'] ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-md font-bold text-slate-900">{{ $item['author'] ?? 'Parent Name' }}</h4>
                                <span class="text-sm text-slate-500">{{ $item['role'] ?? 'Parent' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
