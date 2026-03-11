<section class="hero min-h-[85vh] relative overflow-hidden" 
    style="
        background-color: #0f172a;
        background-image: @if(isset($data['background_image'])) url('{{ Storage::url($data['background_image']) }}') @else none @endif;
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    ">
    
    {{-- Dynamic Overlay with Inline Style --}}
    <div style="
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 41, 59, 0.7) 100%);
        backdrop-filter: blur(2px);
    "></div>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-hero-text {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .hero-title {
            text-shadow: 0 4px 12px rgba(0,0,0,0.3);
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <div class="relative z-10 text-center w-full max-w-7xl px-4">
        <div class="max-w-4xl mx-auto py-20 animate-hero-text">
            <h1 class="hero-title mb-6 text-5xl lg:text-8xl font-black leading-none tracking-tighter">
                {{ $data['title'] ?? 'The Future Belongs To Top Performers' }}
            </h1>
            <p class="mb-10 text-xl lg:text-3xl text-gray-300 font-light leading-relaxed max-w-3xl mx-auto">
                {{ $data['subtitle'] ?? 'Our mission is to foster a rigorous academic environment rooted in principles.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                @if(isset($data['primary_button_label']) && isset($data['primary_button_url']))
                    <a href="{{ $data['primary_button_url'] }}" 
                       class="px-10 py-5 bg-white text-indigo-950 font-bold rounded-2xl hover:bg-opacity-90 transition-all active:scale-95 shadow-xl shadow-white/10"
                       style="text-decoration: none;">
                        {{ $data['primary_button_label'] }}
                    </a>
                @endif
                <a href="#explore" 
                   class="px-10 py-5 border-2 border-white/30 text-white font-bold rounded-2xl hover:bg-white/10 transition-all active:scale-95"
                   style="text-decoration: none; backdrop-filter: blur(10px);">
                    Explore Our Campus
                </a>
            </div>
        </div>
    </div>

    {{-- Decorative element --}}
    <div style="
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 151px;
        background: linear-gradient(to top, #fff, transparent);
        pointer-events: none;
    " class="dark:hidden"></div>
</section>
