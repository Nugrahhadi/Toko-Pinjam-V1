<div x-data="{ scrolled: false }"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 64)"
     class="relative">

    {{-- NAVBAR --}}
    <livewire:components.navbar />

    <div class="flex">
        {{-- SIDEBAR --}}
        <aside
            :class="scrolled ? 'top-0 h-screen' : 'top-16 h-[calc(100vh-4rem)]'"
            class="sticky left-0 w-72 bg-[#fdf3f0] text-[#3a2882] text-sm z-30 overflow-y-auto shadow-md transition-all duration-300 ease-in-out"
        >
            <div class="p-4 space-y-6">

                {{-- Input Search --}}
                <div class="relative mt-4">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </span>
                    <input type="text" 
                           wire:model.debounce.300ms="search"
                           placeholder="Cari kata kunci"
                           class="w-full pl-10 pr-3 py-2 bg-[#A79C97] text-white placeholder-white rounded focus:outline-none text-sm" />
                </div>

                {{-- Kategori --}}
                <div>
                    <h2 class="text-base font-bold mb-2">Kategori:</h2>
                    <ul class="space-y-2">
                        <li>
                            <label class="inline-flex items-center">
                                <input type="radio" wire:click="filterByCategory('all')" 
                                       name="category" 
                                       class="form-radio text-[#3a2882]" 
                                       {{ $selectedCategory === 'all' ? 'checked' : '' }}>
                                <span class="ml-2">Semua</span>
                            </label>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <label class="inline-flex items-center">
                                    <input type="radio" wire:click="filterByCategory('{{ $category->slug }}')" 
                                           name="category" 
                                           class="form-radio text-[#3a2882]" 
                                           {{ $selectedCategory === $category->slug ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $category->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr class="border-t border-gray-400">

                {{-- Form Request Barang --}}
                <div class="text-center space-y-3">
                    <h2 class="text-lg font-bold text-[#5a514f]">Barang Apa yang Perlu Kami Sediakan?</h2>
                    <form wire:submit.prevent="submitRequest" class="flex flex-col w-full max-w-sm mx-auto">
                        <input type="text" 
                               wire:model="requestItem"
                               placeholder="Tulis di sini.."
                               class="px-4 py-3 bg-[#a79c97] placeholder-gray-300 text-white text-center focus:outline-none rounded-t-md">
                        <button type="submit" 
                                class="bg-[#5a514f] text-white py-3 rounded-b-md hover:bg-[#4b4340] transition">
                            Kirim
                        </button>
                    </form>
                    @error('requestItem') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                    @enderror
                    @if (session()->has('message'))
                        <p class="text-green-600 text-sm mt-2">{{ session('message') }}</p>
                    @endif
                </div>
            </div>
        </aside>

        {{-- KONTEN --}}
        <main class="pl-10 w-full py-10 px-6 bg-white">
            <h1 class="text-3xl font-bold text-[#3a2882] mb-8 text-center">Mau Pinjam Apa Hari Ini?</h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @forelse($items as $item)
                    <div class="bg-white overflow-hidden">
                        <img src="{{ asset('images/barang/' . $item['image']) }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-full h-64 object-cover">
                        <div class="p-0 text-lg text-left font-semibold text-[#3a2882]">
                            {{ $item['name'] }}
                        </div>
                        <div>
                            <span class="text-sm font-bold text-[#433592]">
                                Rp{{ number_format($item['price']) }}
                            </span>
                            <span class="text-gray-500 text-sm">/hari</span>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Tidak ada barang yang ditemukan.</p>
                @endforelse
            </div>
        </main>
    </div>
    <livewire:components.footer />
</div>
