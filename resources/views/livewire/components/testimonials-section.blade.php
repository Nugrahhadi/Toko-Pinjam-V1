<div>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    What our 34,000* members say
                </h2>
            </div>

            <div class="relative overflow-hidden">
                <div class="flex gap-6 testimonials-scroll">
                    @foreach($testimonials as $testimonial)
                        <div class="bg-white rounded-lg shadow-sm p-6 min-w-80 flex-shrink-0">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                                    @if($testimonial->avatar)
                                        <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <span class="text-gray-500 font-medium">{{ substr($testimonial->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                "{{ $testimonial->message }}"
                            </p>
                            @if($testimonial->location)
                                <p class="text-gray-500 text-xs mt-3">{{ $testimonial->location }}</p>
                            @endif
                        </div>
                    @endforeach
                    
                    @foreach($testimonials as $testimonial)
                        <div class="bg-white rounded-lg shadow-sm p-6 min-w-80 flex-shrink-0">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                                    @if($testimonial->avatar)
                                        <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <span class="text-gray-500 font-medium">{{ substr($testimonial->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                "{{ $testimonial->message }}"
                            </p>
                            @if($testimonial->location)
                                <p class="text-gray-500 text-xs mt-3">{{ $testimonial->location }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
    .testimonials-scroll {
        animation: testimonials-scroll 30s linear infinite;
    }
    
    @keyframes testimonials-scroll {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%);
        }
    }

    .testimonials-scroll:hover {
        animation-play-state: paused;
    }
    </style>
</div>
