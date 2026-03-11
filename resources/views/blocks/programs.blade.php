<section class="py-32" id="programs" style="background: #ffffff;">
    <style>
        .program-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 2rem;
            padding: 3rem 2rem;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .program-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }
        .program-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px -12px rgba(79, 70, 229, 0.15);
            border-color: transparent;
        }
        .program-card:hover::before {
            opacity: 1;
        }
        .program-card:hover h3, .program-card:hover p {
            color: white !important;
        }
        .program-icon-wrapper {
            width: 70px;
            height: 70px;
            background: #f1f5f9;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1.5rem;
            margin-bottom: 2rem;
            transition: all 0.5s ease;
        }
        .program-card:hover .program-icon-wrapper {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: scale(1.1) rotate(10deg);
        }
    </style>

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-24">
            <span style="color: #4f46e5; font-weight: 800; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.875rem;">Excellence Driven</span>
            <h2 class="text-5xl lg:text-6xl font-black text-slate-900 mt-4 tracking-tight">
                {{ $data['heading'] ?? 'Our Academic Excellence' }}
            </h2>
            <div style="width: 100px; height: 6px; background: linear-gradient(to right, #4f46e5, #c084fc); margin: 2rem auto; border-radius: 99px;"></div>
        </div>

        @if(!empty($data['items']))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($data['items'] as $item)
                    <div class="program-card group">
                        <div class="program-icon-wrapper">
                            @if(!empty($item['icon']))
                                <x-icon name="{{ $item['icon'] }}" style="width: 32px; height: 32px;" />
                            @else
                                <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 transition-colors">{{ $item['title'] ?? 'Program Title' }}</h3>
                        <p class="text-slate-500 leading-relaxed transition-colors">
                            {{ $item['description'] ?? 'Program description goes here. Explain the benefits to students.' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <div style="padding: 4rem; text-align: center; background: #f8fafc; border-radius: 2rem; border: 2px dashed #e2e8f0;">
                <p class="text-slate-400 italic font-medium">No programs added yet.</p>
            </div>
        @endif
    </div>
</section>
