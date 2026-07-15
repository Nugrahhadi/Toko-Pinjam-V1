<div>
    {{-- Biar tidak ubah layout, navbar/footer tetap di sini --}}
    <livewire:components.navbar />

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-center mb-10">
                <h1 class="text-2xl lg:text-4xl font-bold text-purple-700 mr-4">
                    {{ __('Frequently Asked Questions (FAQ)') }}
                </h1>
                <img src="{{ asset('images/aiusage/kucing.png') }}" alt="Maskot" class="w-[100px]">
            </div>

            <!-- FAQ Items (Alpine-only toggle) -->
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden" x-data="{ open: false }">
                        <button
                            type="button"
                            @click="open = !open"
                            class="w-full px-6 py-4 text-left bg-[#FAF0EB] hover:bg-yellow-100 transition-colors duration-100 flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <span class="font-bold text-purple-700 pr-4">{{ __($faq['question']) }}</span>

                            <svg
                                class="w-5 h-5 text-purple-700 transform transition-transform duration-200 flex-shrink-0"
                                :class="open ? 'rotate-180' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div
                            class="overflow-hidden transition-all duration-300 ease-in-out"
                            :class="open ? 'max-h-96 opacity-100' : 'max-h-0 opacity-0'"
                            x-ref="content"
                        >
                            <div class="px-6 py-4 bg-orange-500 text-white">
                                {{ __($faq['answer']) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bottom Contact Section -->
            <div class="text-center mt-12 mb-8">
                <p class="text-gray-600 text-lg">
                    {{ __('Pertanyaanmu Belum Terjawab?') }}
                    <a href="{{ route('kontak') }}" class="text-purple-700 hover:text-purple-900 font-medium underline">
                        {{ __('Hubungi Kami!') }}
                    </a>
                </p>
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>
