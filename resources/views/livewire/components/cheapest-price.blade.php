<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl text-[#433592] mb-6" style="font-weight: 800; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Kami Menjamin Harga Termurah
            </h2>
            <p class="text-lg text-[#433592] max-w-3xl mx-auto leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Tidak perlu lagi mengeluarkan ratusan hingga jutaan rupiah hanya untuk barang yang dipakai jarang-jarang. 
                Mulai dari 10 Ribu, kamu bisa pinjam dan pakai barang-barang ini. Dengan begitu, sisa uang kamu bisa dipakai 
                untuk keperluan yang lain!
            </p>
        </div>

        <!-- Items Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 lg:gap-6">
            @foreach($this->getDisplayedItems() as $index => $item)
            <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300" 
                 wire:click="viewItemDetail('{{ $item['name'] }}')">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <!-- Image rasio 1:1 -->
                    <div class="aspect-square overflow-hidden bg-gray-50">
                        <img src="{{ asset('images/barang/' . $item['image']) }}" 
                             alt="{{ $item['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    
                    <!-- Content -->
                    <div class="p-3 lg:p-4">
                        <div class="mb-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium text-[#433592] bg-[#FDF2EB] rounded-full" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ $item['category'] }}
                            </span>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ $item['name'] }}
                        </h3>
                        <div class="flex items-center justify-between">
                            <span class="text-base lg:text-lg font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Rp {{ $item['price'] }}
                            </span>
                            <span class="text-xs text-gray-500" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                per hari
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-12">
            <button wire:click="toggleShowAll" class="inline-flex items-center px-8 py-4 bg-[#433592] text-white font-semibold rounded-lg hover:bg-[#3A2B7A] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ $showAll ? 'Lihat Lebih Sedikit' : 'Lihat Semua Barang' }}
                <svg class="ml-2 w-5 h-5 {{ $showAll ? 'rotate-180' : '' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </button>
        </div>
    </div>
</section>
