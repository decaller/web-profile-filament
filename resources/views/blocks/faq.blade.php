<section class="py-24 bg-white" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-slate-900 mb-16 tracking-tight">
            {{ $data['heading'] ?? 'Frequently Asked Questions' }}
        </h2>

        @if(!empty($data['questions']))
            <div class="space-y-6">
                @foreach($data['questions'] as $index => $faq)
                    <div class="group border border-slate-200 rounded-2xl p-6 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all duration-300">
                        <summary class="flex justify-between items-center cursor-pointer font-semibold text-lg text-slate-900 list-none">
                            <span>{{ $faq['question'] ?? 'Question?' }}</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" class="w-6 h-6 text-indigo-500" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="text-slate-600 mt-4 prose prose-indigo max-w-none prose-p:leading-relaxed">
                            {!! $faq['answer'] ?? 'Answer goes here.' !!}
                        </div>
                    </div>
                @endforeach
            </div>
            
            <script>
                // Add simple toggle behavior since we aren't loading full AlpineJS yet
                document.querySelectorAll('summary').forEach((summary) => {
                    summary.addEventListener('click', (e) => {
                        e.preventDefault();
                        const details = summary.nextElementSibling;
                        const icon = summary.querySelector('span:last-child');
                        if (details.style.display === 'none' || !details.style.display) {
                            details.style.display = 'block';
                            icon.classList.add('rotate-180');
                        } else {
                            details.style.display = 'none';
                            icon.classList.remove('rotate-180');
                        }
                    });
                    
                    // Hide answers initially
                    summary.nextElementSibling.style.display = 'none';
                });
            </script>
        @endif
    </div>
</section>
