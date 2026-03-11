<section class="py-24 bg-indigo-50 border-y border-indigo-100 relative overflow-hidden">
    <div class="absolute top-0 right-0 -tr-translate-x-1/2 -tr-translate-y-1/2 rounded-full w-[40rem] h-[40rem] bg-indigo-200/40 blur-3xl mix-blend-multiply pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div>
            <span class="text-indigo-600 font-semibold tracking-wide uppercase text-sm mb-3 block">Our Solution</span>
            <h2 class="text-4xl font-extrabold text-slate-900 mb-8 leading-tight">
                {{ $data['heading'] ?? 'A Future-Ready Curriculum Designed For Excellence' }}
            </h2>
            <div class="prose prose-indigo prose-lg text-slate-600">
                {!! $data['description'] ?? 'We believe that education must evolve. Our curriculum goes beyond standard text books by integrating modern perspectives, digital fluency, and leadership development into our core teaching model.' !!}
            </div>
        </div>
        <div class="relative">
            <div class="absolute inset-0 bg-indigo-600 rounded-2xl transform rotate-3 scale-105 opacity-20 blur-xl"></div>
            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Students learning" class="rounded-2xl shadow-2xl relative z-10 w-full object-cover h-[500px]">
        </div>
    </div>
</section>
