<div>
    <!-- Header Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold mb-4" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Semua Barang Tersedia
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Temukan berbagai barang berkualitas yang bisa kamu pinjam dengan harga terjangkau. Dari elektronik hingga peralatan sehari-hari.
                </p>
            </div>
        </div>
    </div>

    <!-- Items Grid -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="mb-8 flex flex-wrap gap-4 justify-center">
                <button wire:click="filterByCategory('all')" 
                        class="px-6 py-2 rounded-lg font-semibold transition-colors {{ $selectedCategory === 'all' ? 'bg-[#433592] text-white' : 'bg-white text-[#433592] border border-[#433592]' }}" 
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Semua
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterByCategory('{{ $category->slug }}')" 
                            class="px-6 py-2 rounded-lg font-semibold transition-colors {{ $selectedCategory === $category->slug ? 'bg-[#433592] text-white' : 'bg-white text-[#433592] border border-[#433592]' }}" 
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <!-- Items Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($items as $item)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="{{ asset('images/barang/' . $item['image']) }}" 
                                 alt="{{ $item['name'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 right-3">
                                <span class="bg-[#433592] text-white text-xs px-2 py-1 rounded-full font-semibold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ $item['category'] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ $item['name'] }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ $item['description'] }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                        Rp{{ number_format($item['price']) }}
                                    </span>
                                    <span class="text-gray-500 text-sm">/hari</span>
                                </div>
                                <button class="bg-[#433592] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#3A2B7A] transition-colors text-sm" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Pinjam
                                </button>
                            </div>
                            <div class="mt-3 flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $item['location'] }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-gray-500 text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Tidak ada barang yang ditemukan untuk kategori ini.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($items->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
