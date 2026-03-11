<section class="py-24 relative overflow-hidden bg-indigo-900">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center opacity-10 mix-blend-overlay"></div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-indigo-500/20 to-transparent transform -skew-x-12 translate-x-1/4"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight leading-tight">
            {{ $data['heading'] ?? 'Ready To Start Your Journey?' }}
        </h2>
        @if(!empty($data['text']))
            <p class="text-xl text-indigo-200 mb-10 max-w-2xl mx-auto font-light">
                {{ $data['text'] }}
            </p>
        @endif
        
        <a href="{{ $data['button_url'] ?? '#' }}" class="inline-flex items-center justify-center px-10 py-5 text-lg font-bold text-indigo-900 bg-white rounded-xl hover:bg-indigo-50 shadow-[0_0_30px_rgba(255,255,255,0.2)] transition-all duration-300 transform hover:-translate-y-1">
            {{ $data['button_label'] ?? 'Apply Now for 2026' }}
            <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</section>
