<section class="py-24 bg-base-100" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-base-content mb-16 tracking-tight">
            {{ $data['heading'] ?? 'Frequently Asked Questions' }}
        </h2>

        @if(!empty($data['questions']))
            <div class="space-y-4">
                @foreach($data['questions'] as $index => $faq)
                    <div class="collapse collapse-plus bg-base-200 border border-base-300">
                        <input type="radio" name="faq-accordion" {{ $index === 0 ? 'checked="checked"' : '' }} /> 
                        <div class="collapse-title text-xl font-medium text-base-content">
                            {{ $faq['question'] ?? 'Question?' }}
                        </div>
                        <div class="collapse-content text-base-content/80 prose max-w-none"> 
                            {!! $faq['answer'] ?? 'Answer goes here.' !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
