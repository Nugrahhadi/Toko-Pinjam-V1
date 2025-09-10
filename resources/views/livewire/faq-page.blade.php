<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>FAQ - Frequently Asked Questions - Toko Pinjam</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_io/favicon.ico') }}">
    
    <!-- Scripts -->
    @if(app()->environment('production') && !file_exists(public_path('build/manifest.json')))
        <!-- Fallback CDN CSS/JS for production if build assets not available -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>
    <div>
        <livewire:components.navbar />

        <div class="min-h-screen bg-gray-50 py-8">
            <div class="max-w-4xl mx-auto px-4">
                
                <!-- Header Section -->
                <div class="flex flex-col lg:flex-row justify-between items-center mb-10">
                    <h1 class="text-4xl font-bold text-purple-700 mr-4">
                        Frequently<br>
                        Asked Questions<br>
                        (FAQ)
                    </h1>
                    <img src="{{ asset('images/aiusage/kucing.png') }}" alt="Maskot" class="w-[100px]">
                </div>

                <!-- FAQ Items -->
                <div class="space-y-4">
                    @foreach($faqs as $index => $faq)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <button 
                                wire:click="toggleItem({{ $index }})"
                                class="w-full px-6 py-4 text-left bg-[#FAF0EB] hover:bg-yellow-100 transition-colors duration-100 flex justify-between items-center"
                            >
                                <span class="font-bold text-purple-700">{{ $faq['question'] }}</span>
                                <svg 
                                    class="w-5 h-5 text-purple-700 transform transition-transform duration-200 {{ isset($openItems[$index]) ? 'rotate-180' : '' }}"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div class="overflow-hidden transition-all duration-300 ease-in-out {{ isset($openItems[$index]) ? 'max-h-96' : 'max-h-0' }}">
                                <div class="px-6 py-4 bg-orange-500 text-white">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Bottom Contact Section -->
                <div class="text-center mt-12 mb-8">
                    <p class="text-gray-600 text-lg">
                        Pertanyaanmu Belum Terjawab? 
                        <a href="{{ route('kontak') }}" class="text-purple-700 hover:text-purple-900 font-medium underline">
                            Hubungi Kami!
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <livewire:components.footer />
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
