<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col gap-8 p-6 sm:gap-10 sm:p-8 md:gap-12 md:p-10 lg:p-12">
            {{-- Header Section --}}
            <div class="relative overflow-hidden p-4 shadow-xl dark:shadow-none">
                <div class="relative z-10">
                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-slate-900 dark:text-white">
                        Selamat Datang di Board Kontrol Sekolah
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg font-medium leading-relaxed text-slate-500 dark:text-slate-400">
                        Ikuti panduan cepat di bawah ini untuk mengelola website sekolah Anda secara efisien dan
                        terstruktur.
                    </p>
                </div>
                <div class="absolute -right-8 -top-8 text-slate-200 dark:text-slate-800/50">
                    <x-heroicon-o-academic-cap class="h-48 w-48" />
                </div>
            </div>

            {{-- Row 1: Building Pages --}}
            <div
                class="group relative border border-slate-200 p-8 shadow-sm transition-all hover:border-primary-300 hover:shadow-md dark:border-slate-700 dark:hover:border-primary-500 sm:p-10 md:p-12">
                <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-12">
                    <div class="flex items-center gap-5 lg:w-1/4">
                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center text-primary-600 dark:text-primary-400">
                            <x-heroicon-o-document-text class="h-8 w-8" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">1. Manajemen Halaman</h3>
                    </div>
                    <div class="grid flex-1 grid-cols-1 gap-8 sm:grid-cols-2">
                        <div class="flex gap-5">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center text-base font-bold text-slate-600 dark:text-slate-300">1</span>
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white">Kelola Pages</h4>
                                <p class="mt-2 text-sm leading-relaxed text-slate-500 dark:text-slate-400">Gunakan tab
                                    <strong class="dark:text-slate-200">Pages</strong> untuk mengedit konten utama
                                    profil sekolah.</p>
                            </div>
                        </div>
                        <div class="flex gap-5">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center text-base font-bold text-slate-600 dark:text-slate-300">2</span>
                            <div>
                                <h4 class="text-lg font-bold text-slate-900 dark:text-white">Atur Menu</h4>
                                <p class="mt-2 text-sm leading-relaxed text-slate-500 dark:text-slate-400">Sambungkan
                                    halaman ke navigasi di <strong class="dark:text-slate-200">Settings ->
                                        Menus</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Row 2: Content Management --}}
            <div
                class="group relative border border-slate-200 p-8 shadow-sm transition-all hover:border-primary-300 hover:shadow-md dark:border-slate-700 dark:hover:border-primary-500 sm:p-10 md:p-12">
                <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-12">
                    <div class="flex items-center gap-5 lg:w-1/4">
                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center text-orange-600 dark:text-orange-400">
                            <x-heroicon-o-square-3-stack-3d class="h-8 w-8" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">2. Jenis Konten</h3>
                    </div>
                    <div class="grid flex-1 grid-cols-2 gap-6 md:grid-cols-4">
                        @foreach([
                                ['label' => 'Posts', 'icon' => 'heroicon-o-newspaper', 'color' => 'text-blue-600 dark:text-blue-400'],
                                ['label' => 'Activities', 'icon' => 'heroicon-o-camera', 'color' => 'text-emerald-600 dark:text-emerald-400'],
                                ['label' => 'Publications', 'icon' => 'heroicon-o-document-check', 'color' => 'text-purple-600 dark:text-purple-400'],
                                ['label' => 'Testimonials', 'icon' => 'heroicon-o-star', 'color' => 'text-amber-600 dark:text-amber-400'],
                            ] as $item)
                            <div class="flex items-center gap-4 p-4 transition-colors">
                                <x-dynamic-component :component="$item['icon']" class="h-6 w-6 shrink-0 {{ $item['color'] }}" />
                                <span class="text-base font-bold text-slate-700 dark:text-slate-200">{{ $item['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        
                               {{-- Row 3: Tips & Advanced --}}
            <div class="flex flex-col gap-8 lg:flex-row lg:gap-10">
                <div class="flex-1 border border-slate-200 p-8 shadow-sm dark:border-slate-700 sm:p-10 md:p-12">
                    <div class="mb-8 flex items-center gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <x-heroicon-o-sparkles class="h-7 w-7" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">3. Tips Page Builder</h3>

                                   
                                                   </div>
                    <ul class="flex flex-col gap-6">
                        <li class="flex items-start gap-4 text-base">
                            <div class="mt-2 h-2 w-2 shrink-0 border border-indigo-500"></div>
                               
      
                                                         <span class="leading-relaxed text-slate-600 dark:text-slate-300">Gunakan blok <strong class="font-bold text-indigo-600 dark:text-indigo-400">Recent Blogs</strong> untuk menampilkan post terbaru secara otomatis.</span>
                        </li>
                        <li class="flex items-start gap-4 text-base">
            <div class="mt-2 h-2 w-2 shrink-0 border border-emerald-500"></div>
                            <span class="leading-relaxed text-slate-600 dark:text-slate-300">Blok <strong class="font-bold text-emerald-600 dark:text-emerald-400">Activities</strong> sangat bagus untuk halaman galeri sekolah.</span>
                        </li>
                    </ul>
                </div>
                
                <div class="p-8 shadow-xl dark:border dark:border-slate-700 sm:p-10 md:p-12 lg:w-1/3">
                    <div class="mb-6 flex items-center gap-4">

                           
                                                   <x-heroicon-m-light-bulb class="h-8 w-8 shrink-0 text-amber-500 dark:text-amber-400" />
    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Info Akhir</h3>
                    </div>
                    <p class="mb-8 text-base leading-relaxed text-slate-600 dark:text-slate-300">
                        Pastikan Logo & Kontak sekolah terupdate di <strong class="text-slate-900 dark:text-white">Basic Info</strong>. Untuk menambah Admin, gunakan menu <strong class="text-slate-900 dark:text-white">Users</strong>.
                    </p>
        

                   </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
