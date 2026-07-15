<div>
    @section('title', 'Semua Barang')

    <livewire:components.navbar />
    <!-- Header Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold mb-4" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    {{ __('Semua Barang Tersedia') }}
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    {{ __('Temukan berbagai barang berkualitas yang bisa kamu pinjam dengan harga terjangkau. Dari elektronik hingga peralatan sehari-hari.') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Items Grid -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search & Filter Section -->
            <div class="mb-8 space-y-4">
                <!-- Search Box -->
                <div class="max-w-md mx-auto">
                    <div class="relative">
                        <input 
                            type="text" 
                            wire:model.live.debounce.300ms="search"
                            placeholder="{{ __('Cari barang...') }}"
                            class="w-full px-4 py-3 pl-12 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#433592] focus:border-transparent"
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        @if($search)
                            <button 
                                wire:click="$set('search', '')" 
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <button wire:click="filterByCategory('all')"
                            class="px-5 py-2 rounded-lg font-semibold transition-colors text-sm {{ $selectedCategory === 'all' ? 'bg-[#433592] text-white' : 'bg-white text-[#433592] border border-[#433592] hover:bg-[#433592] hover:text-white' }}"
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('Semua') }}
                    </button>
                    @foreach($categories as $category)
                        <button wire:click="filterByCategory('{{ $category->slug }}')"
                                class="px-5 py-2 rounded-lg font-semibold transition-colors text-sm {{ $selectedCategory === $category->slug ? 'bg-[#433592] text-white' : 'bg-white text-[#433592] border border-[#433592] hover:bg-[#433592] hover:text-white' }}"
                                style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Search Result Info -->
                @if($search)
                    <div class="text-center">
                        <p class="text-sm text-gray-600" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ __('Menampilkan hasil pencarian untuk') }} "<span class="font-semibold text-[#433592]">{{ $search }}</span>"
                        </p>
                    </div>
                @endif
            </div>

            <!-- Items Grid - 5 Columns -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 lg:gap-6 items-stretch">
    @forelse($items as $item)
        @php
            $first = $item->images[0] ?? null;
            $img = $first
                ? (\Illuminate\Support\Str::startsWith($first, ['http://','https://','/']) 
                    ? $first 
                    : asset('storage/'.$first))
                : 'https://via.placeholder.com/640x640?text=No+Image';
        @endphp

        <!-- h-full + flex flex-col supaya semua kartu tingginya sama -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow group h-full flex flex-col">
            <a href="{{ route('items.show', $item->slug) }}" class="block focus:outline-none focus:ring-2 focus:ring-[#433592]">
                <div class="relative aspect-square overflow-hidden">
                    <img src="{{ $img }}"
                         alt="{{ $item->name }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 right-2">
                        <span class="bg-[#433592] text-white text-xs px-2 py-1 rounded-full font-semibold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ $item->category->name ?? __('Tanpa Kategori') }}
                        </span>
                    </div>
                </div>
            </a>

            <!-- flex-1 + flex-col: konten isi memenuhi tinggi, elemen bawah didorong ke dasar -->
            <div class="p-3 lg:p-4 flex-1 flex flex-col">
                <!-- Kunci tinggi judul = 2 baris -->
                <h3 class="text-sm lg:text-base font-bold text-gray-900 mb-2 line-clamp-2 min-h-[2.5rem] lg:min-h-[3rem]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    {{ $item->name }}
                </h3>

                <!-- Blok bawah: harga+pinjam & lokasi. mt-auto = selalu menempel bawah -->
                <div class="mt-auto space-y-2">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-baseline gap-1">
                                <span class="text-base lg:text-lg font-bold text-[#433592] truncate" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Rp{{ number_format($item->donation_price) }}
                                </span>
                                <span class="text-gray-500 text-xs whitespace-nowrap">/ {{ __('hari') }}</span>
                            </div>
                        </div>
                        <a href="{{ route('items.show', $item->slug) }}"
                           class="bg-[#433592] text-white px-3 py-1.5 lg:px-4 lg:py-2 rounded-lg font-semibold hover:bg-[#3A2B7A] transition-colors text-xs lg:text-sm whitespace-nowrap"
                           style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ __('Pinjam') }}
                        </a>
                    </div>
 
                    <div class="flex items-center text-xs lg:text-sm text-gray-500">
                        <svg class="w-3 h-3 lg:w-4 lg:h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="truncate">{{ $item->location->name ?? __('Lokasi tidak tersedia') }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 lg:py-16">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-500 text-base lg:text-lg mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                @if($search)
                    {{ __('Tidak ada barang yang sesuai dengan pencarian') }} "{{ $search }}"
                @else
                    {{ __('Tidak ada barang yang ditemukan untuk kategori ini.') }}
                @endif
            </p>
            @if($search || $selectedCategory !== 'all')
                <button 
                    wire:click="$set('search', ''); $set('selectedCategory', 'all')"
                    class="mt-4 px-6 py-2 bg-[#433592] text-white rounded-lg font-semibold hover:bg-[#3A2B7A] transition-colors"
                    style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    {{ __('Lihat Semua Barang') }}
                </button>
            @endif
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
    <livewire:components.footer />
</div>

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Loading animation untuk Livewire */
[wire\:loading] {
    opacity: 0.5;
    pointer-events: none;
}
</style>
@endpush
