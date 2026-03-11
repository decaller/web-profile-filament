@php
    $headerMenu = \Datlechin\FilamentMenuBuilder\Models\Menu::location('header');
    $settings = \App\Models\Setting::first();
@endphp
<nav class="bg-base-100/80 backdrop-blur-md sticky top-0 z-50 border-b border-base-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center shrink-0">
                @if($settings?->site_logo)
                    <a href="/" class="flex items-center gap-2">
                        <img src="{{ Storage::url($settings->site_logo) }}" alt="{{ $settings->site_title ?? 'Logo' }}" class="h-8 max-w-full object-contain">
                        @if($settings?->site_title)
                            <span class="text-xl font-bold text-primary hidden sm:inline-block">{{ $settings->site_title }}</span>
                        @endif
                    </a>
                @else
                    <a href="/" class="text-xl font-bold text-primary">{{ $settings?->site_title ?? 'School Profile' }}</a>
                @endif
            </div>
            
            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center space-x-4">
                @if($headerMenu)
                    @foreach($headerMenu->menuItems as $item)
                        <div class="relative group">
                            <a href="{{ $item->url }}" 
                               target="{{ $item->target }}"
                               class="{{ $item->classes }} text-base-content/70 hover:text-primary font-medium px-3 py-2 rounded-md transition-colors {{ $item->isActive() ? 'text-primary font-semibold' : '' }}">
                                @if($item->icon)
                                    <x-icon name="{{ $item->icon }}" class="w-4 h-4 inline-block mr-1" />
                                @endif
                                {{ $item->resolveLocale($item->title) }}
                                @if($item->children->isNotEmpty())
                                    <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                @endif
                            </a>
                            
                            {{-- Dropdown for children --}}
                            @if($item->children->isNotEmpty())
                                <div class="absolute left-0 mt-2 w-48 bg-base-100 border border-base-200 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="py-1">
                                        @foreach($item->children as $child)
                                            <a href="{{ $child->url }}" 
                                               target="{{ $child->target }}"
                                               class="block px-4 py-2 text-sm text-base-content/80 hover:bg-base-200 hover:text-primary {{ $child->classes }}">
                                                {{ $child->resolveLocale($child->title) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    {{-- Fallback when no menu is set up --}}
                    <a href="/" class="text-base-content/70 hover:text-primary font-medium">Home</a>
                    <a href="/about" class="text-base-content/70 hover:text-primary font-medium">About</a>
                    <a href="/admissions" class="text-base-content/70 hover:text-primary font-medium">Admissions</a>
                @endif
            </div>

            {{-- Theme Controller --}}
            <div class="flex items-center space-x-2 md:mr-0 mr-4">
                <label class="flex cursor-pointer gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5" />
                        <path
                        d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                    </svg>
                    <input type="checkbox" value="dim" class="toggle theme-controller" />
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </label>
            </div>

            {{-- Mobile Menu Button (simplified) --}}
            <div class="flex items-center md:hidden">
                <button type="button" class="text-base-content/70 hover:text-base-content focus:outline-none" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
