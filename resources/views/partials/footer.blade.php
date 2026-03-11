@php
    $footerMenu = \Datlechin\FilamentMenuBuilder\Models\Menu::location('footer');
    $settings = \App\Models\Setting::first();
@endphp
<footer class="bg-neutral text-neutral-content pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="col-span-1 md:col-span-2">
                <span class="text-2xl font-bold tracking-tight mb-4 inline-block">{{ $settings->site_title ?? 'School Profile' }}</span>
                <p class="text-neutral-content/80 mb-6 max-w-sm">
                    {{ $settings->site_description ?? "Empowering students for tomorrow's challenges through rigorous academics, character development, and inclusive community values." }}
                </p>
            </div>
            
            <div class="col-span-1">
                <h3 class="text-sm font-semibold tracking-wider text-neutral-content/90 uppercase mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    @if($footerMenu)
                        @foreach($footerMenu->menuItems as $item)
                            <li>
                                <a href="{{ $item->url }}" 
                                   target="{{ $item->target }}" 
                                   class="{{ $item->classes }} text-neutral-content/70 hover:text-neutral-content transition-colors">
                                    {{ $item->resolveLocale($item->title) }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li><a href="#" class="text-neutral-content/70 hover:text-neutral-content transition-colors">About Us</a></li>
                        <li><a href="#" class="text-neutral-content/70 hover:text-neutral-content transition-colors">Admissions</a></li>
                        <li><a href="#" class="text-neutral-content/70 hover:text-neutral-content transition-colors">Academics</a></li>
                        <li><a href="#" class="text-neutral-content/70 hover:text-neutral-content transition-colors">Campus Life</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-span-1">
                <h3 class="text-sm font-semibold tracking-wider text-neutral-content/90 uppercase mb-4">Contact</h3>
                <ul class="space-y-3">
                    @if($settings?->contact_address)
                    <li class="flex text-neutral-content/70">
                        <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{!! nl2br(e($settings->contact_address)) !!}</span>
                    </li>
                    @endif
                    @if($settings?->contact_email)
                    <li class="flex text-neutral-content/70">
                        <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>{{ $settings->contact_email }}</span>
                    </li>
                    @endif
                    @if($settings?->contact_phone)
                    <li class="flex text-neutral-content/70">
                        <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>{{ $settings->contact_phone }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        
        <div class="border-t border-neutral-content/10 pt-8 flex flex-col md:flex-row justify-between items-center text-neutral-content/60">
            <p class="text-sm">
                &copy; {{ date('Y') }} {{ config('app.name', 'School Profile') }}. All rights reserved.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                @if($settings?->social_links)
                    @foreach($settings->social_links as $social)
                        <a href="{{ $social['url'] }}" class="text-neutral-content/70 hover:text-neutral-content" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">{{ $social['platform'] }}</span>
                            @if(!empty($social['icon']))
                                <i class="{{ $social['icon'] }} text-xl"></i>
                            @else
                                <!-- Default Link Icon -->
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            @endif
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>
