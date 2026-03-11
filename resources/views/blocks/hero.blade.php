<section class="hero min-h-[70vh] bg-base-200" 
    @if(isset($data['background_image']))
        style="background-image: url('{{ Storage::url($data['background_image']) }}');"
    @endif>
    
    @if(isset($data['background_image']))
        <div class="hero-overlay bg-opacity-80 bg-base-300"></div>
    @endif

    <div class="hero-content text-center w-full max-w-5xl">
        <div class="max-w-4xl py-12">
            <h1 class="mb-5 text-5xl lg:text-7xl font-bold leading-tight">
                {{ $data['title'] ?? 'The Future Belongs To Top Performers' }}
            </h1>
            <p class="mb-8 text-xl lg:text-3xl opacity-80 font-light">
                {{ $data['subtitle'] ?? 'Our mission is to foster a rigorous academic environment rooted in principles.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if(isset($data['primary_button_label']) && isset($data['primary_button_url']))
                    <a href="{{ $data['primary_button_url'] }}" class="btn btn-primary btn-lg rounded-full">
                        {{ $data['primary_button_label'] }}
                    </a>
                @endif
                <a href="#explore" class="btn btn-outline btn-lg rounded-full">
                    Explore Our Campus
                </a>
            </div>
        </div>
    </div>
</section>
