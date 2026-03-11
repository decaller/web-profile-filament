<section class="py-24 bg-base-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="card bg-base-200 shadow-xl border border-base-300">
            <div class="card-body items-center text-center py-16">
                <div class="inline-flex items-center justify-center p-4 bg-error/10 text-error rounded-full mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <h2 class="card-title text-4xl font-bold mb-6">
                    {{ $data['heading'] ?? 'Are you struggling to find the right environment for your child?' }}
                </h2>
                <div class="prose prose-lg text-base-content/80">
                    {!! $data['description'] ?? 'Many traditional schooling systems fall short of meeting modern demands. We focus on bridging the gap between talent and real-world application.' !!}
                </div>
            </div>
        </div>
    </div>
</section>
