<section class="relative bg-slate-900 border-b border-white/10 overflow-hidden">
    @if(isset($data['background_image']))
        <div class="absolute inset-0 block w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ Storage::url($data['background_image']) }}'); opacity: 0.4;"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    @endif
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-48 flex items-center">
        <div class="w-full lg:w-2/3">
            <h1 class="text-5xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                {{ $data['title'] ?? 'The Future Belongs To Top Performers' }}
            </h1>
            <p class="text-xl lg:text-2xl text-slate-300 font-light max-w-2xl mb-10">
                {{ $data['subtitle'] ?? 'Our mission is to foster a rigorous academic environment rooted in principles.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                @if(isset($data['primary_button_label']) && isset($data['primary_button_url']))
                    <a href="{{ $data['primary_button_url'] }}" class="inline-flex justify-center items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-lg shadow-[0_0_20px_rgba(79,70,229,0.4)] transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                        {{ $data['primary_button_label'] }}
                    </a>
                @endif
                <a href="#explore" class="inline-flex justify-center items-center px-8 py-4 bg-transparent border border-slate-500 hover:border-slate-300 text-white font-semibold rounded-lg transition-all duration-300">
                    Explore Our Campus
                </a>
            </div>
        </div>
    </div>
</section>
