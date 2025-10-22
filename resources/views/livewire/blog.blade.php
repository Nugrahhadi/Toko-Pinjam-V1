<div x-data="{ 
        scrolled: false, 
        sidebarOpen: false,
        toggleSidebar() { this.sidebarOpen = !this.sidebarOpen }
     }"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 64)"
     class="relative">

    {{-- NAVBAR --}}
    <livewire:components.navbar />

    {{-- Mobile Toggle untuk Sidebar --}}
    <div class="lg:hidden bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-[#3a2882]">Blog</h1>
            <div class="flex items-center gap-2">
                {{-- Tombol Tulis Artikel dengan Icon Pensil --}}
                <a href="{{ route('write-article-simple') }}" 
                   class="flex items-center gap-1.5 px-3 py-2 bg-[#4b2ba3] text-white rounded-lg hover:bg-[#3a2882] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    <span class="text-sm font-medium">Tulis</span>
                </a>
                {{-- Tombol Filter & Cari --}}
                <button @click="toggleSidebar()" 
                        class="flex items-center gap-1.5 px-3 py-2 bg-[#fdf3f0] text-[#3a2882] rounded-lg border border-[#3a2882] hover:bg-[#3a2882] hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <span class="text-sm font-medium">Filter</span>
                </button>
            </div>
        </div>
    </div>

    <div class="flex relative">

        {{-- SIDEBAR - Desktop: Fixed sidebar, Mobile: Floating overlay --}}
        <aside class="lg:sticky lg:top-16 lg:h-[calc(100vh-4rem)] lg:w-72 lg:bg-[#fdf3f0] lg:text-[#3a2882] lg:text-sm lg:overflow-y-auto lg:shadow-md">
            
            {{-- Desktop Sidebar Content --}}
            <div class="hidden lg:block p-4 space-y-6">
                {{-- Search Input --}}
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </span>
                    <input type="text"
                        wire:model.live="search"
                        placeholder="Cari artikel..."
                        class="w-full pl-10 pr-3 py-2 bg-[#A79C97] text-white placeholder-white rounded focus:outline-none focus:ring-2 focus:ring-[#3a2882] text-sm" />
                </div>

                {{-- Search Results Info --}}
                @if(strlen($search) > 0)
                    <div class="text-xs text-[#3a2882] bg-white bg-opacity-50 px-3 py-2 rounded">
                        <span class="font-medium">{{ $posts->count() }}</span> artikel ditemukan untuk "<span class="font-medium">{{ $search }}</span>"
                        <button wire:click="$set('search', '')" class="ml-2 text-red-600 hover:text-red-800">
                            <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Kategori --}}
                <div>
                    <h2 class="text-base font-bold mb-3">Kategori:</h2>
                    <ul class="space-y-2">
                        @foreach (['Siaran pers', 'Pengumuman', 'Tutorial', 'Tips'] as $item)
                            <li>
                                <label class="inline-flex items-center cursor-pointer hover:bg-gray-100 hover:bg-opacity-20 rounded p-1 transition-colors">
                                    <input type="checkbox" class="form-checkbox text-[#3a2882] rounded focus:ring-[#3a2882] focus:ring-offset-0">
                                    <span class="ml-2 text-sm">{{ $item }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr class="border-t border-gray-400 border-opacity-50">

                {{-- CTA --}}
                <div class="text-center space-y-4 pt-2">
                    <p class="font-bold text-[#3a2882] text-2xl leading-snug">Tulisanmu<br>Bisa Terbit!</p>
                    <a href="{{ route('write-article-simple') }}"
                        class="inline-block bg-[#4b2ba3] text-white font-semibold px-6 py-2 text-lg rounded shadow hover:bg-[#3a2882] transition-colors">
                        Mulai Menulis
                    </a>
                </div>
            </div>
        </aside>

        {{-- Mobile Floating Overlay --}}
        <div x-show="sidebarOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
             style="display: none;">
        </div>

        <div x-show="sidebarOpen" 
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="fixed top-20 left-4 right-4 bg-[#fdf3f0] rounded-lg shadow-xl z-50 max-h-[75vh] overflow-y-auto lg:hidden"
             style="display: none;"
             @click.stop>
            
            {{-- Mobile Header --}}
            <div class="flex items-center justify-between p-4 border-b border-[#3a2882] border-opacity-20">
                <h3 class="text-base font-bold text-[#3a2882]">Filter & Pencarian</h3>
                <button @click="sidebarOpen = false" class="p-1.5 rounded-md text-[#3a2882] hover:bg-[#3a2882] hover:bg-opacity-10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            {{-- Mobile Content --}}
            <div class="p-4 space-y-4">
                {{-- Mobile Search --}}
                <div>
                    <label class="block text-xs font-semibold text-[#3a2882] mb-2 uppercase tracking-wide">Pencarian</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </span>
                        <input type="text"
                            wire:model.live="search"
                            placeholder="Cari artikel..."
                            class="w-full pl-9 pr-3 py-2.5 bg-[#A79C97] text-white placeholder-white rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a2882] text-sm" />
                    </div>

                    {{-- Mobile Search Results Info --}}
                    @if(strlen($search) > 0)
                        <div class="mt-2 text-xs text-[#3a2882] bg-white bg-opacity-80 px-3 py-2 rounded-lg flex items-center justify-between shadow-sm">
                            <span><strong>{{ $posts->count() }}</strong> hasil untuk "<strong>{{ $search }}</strong>"</span>
                            <button wire:click="$set('search', '')" class="text-red-600 hover:text-red-800 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>

                {{-- Mobile Categories --}}
                <div>
                    <label class="block text-xs font-semibold text-[#3a2882] mb-2 uppercase tracking-wide">Kategori</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach (['Siaran pers', 'Pengumuman', 'Tutorial', 'Tips'] as $item)
                            <label class="inline-flex items-center bg-white bg-opacity-60 px-3 py-2.5 rounded-lg text-sm cursor-pointer hover:bg-opacity-90 transition-all shadow-sm border border-transparent hover:border-[#3a2882]">
                                <input type="checkbox" class="form-checkbox text-[#3a2882] rounded focus:ring-[#3a2882] focus:ring-offset-0 mr-2 h-4 w-4">
                                <span class="text-xs font-medium">{{ $item }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile Actions --}}
                <div class="pt-4 border-t border-[#3a2882] border-opacity-20">
                    <button @click="sidebarOpen = false" 
                            class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-[#4b2ba3] text-white rounded-lg font-medium hover:bg-[#3a2882] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span>Cari</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- KONTEN --}}
        <main class="flex-1 lg:pl-10 w-full py-4 lg:py-10 px-4 lg:px-6 bg-white">
            <div class="mb-6 lg:mb-8 text-center">
                @if(strlen($search) > 0)
                    <h1 class="text-xl lg:text-2xl font-bold text-[#3a2882] mb-2">
                        Hasil Pencarian
                    </h1>
                    <p class="text-sm lg:text-base text-gray-600">
                        Menampilkan <span class="font-medium text-[#3a2882]">{{ $posts->count() }}</span> artikel untuk 
                        "<span class="font-medium">{{ $search }}</span>"
                    </p>
                @else
                    <h1 class="text-2xl lg:text-3xl font-bold text-[#3a2882]">
                        Semua yang Perlu Kamu Tahu
                    </h1>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white rounded-lg overflow-hidden group hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-gray-200">
                        <a href="{{ route('blog.detail', ['slug' => $post->slug ?: $post->id]) }}" class="block">
                            <div class="relative overflow-hidden bg-gray-100">
                                @if($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                                         alt="{{ $post->title }}" 
                                         class="w-full h-48 sm:h-40 lg:h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                                         loading="lazy"
                                         onerror="this.src='https://source.unsplash.com/400x250/?article,blog&{{ $loop->index }}'">
                                @else
                                    <img src="https://source.unsplash.com/400x250/?article,blog&{{ $loop->index }}"
                                         alt="{{ $post->title }}" 
                                         class="w-full h-48 sm:h-40 lg:h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                                         loading="lazy">
                                @endif
                            </div>
                            <div class="p-3 lg:p-4">
                                <div class="text-base lg:text-lg font-semibold text-[#3a2882] group-hover:text-[#4b2ba3] transition-colors line-clamp-2 mb-2 leading-tight">
                                    {{ $post->title }}
                                </div>
                                @if($post->description)
                                <div class="text-sm text-gray-600 line-clamp-2 mb-3 leading-relaxed">
                                    {{ Str::limit($post->description, 80) }}
                                </div>
                                @endif
                                <div class="text-xs text-gray-500 flex items-center justify-between pt-2 border-t border-gray-100">
                                    <span class="flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ $post->views ?? 0 }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Empty State --}}
            @if($posts->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    @if(strlen($search) > 0)
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2 mt-4">Tidak ada artikel ditemukan</h3>
                        <p class="text-gray-500 mb-4">Coba kata kunci yang berbeda atau hapus filter pencarian</p>
                        <button wire:click="$set('search', '')" class="inline-block bg-gray-100 text-gray-700 font-medium px-4 py-2 rounded hover:bg-gray-200 transition mr-2">
                            Hapus Pencarian
                        </button>
                    @else
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2 mt-4">Belum ada artikel</h3>
                        <p class="text-gray-500 mb-4">Jadilah yang pertama menulis artikel!</p>
                    @endif
                    <a href="{{ route('write-article-simple') }}" class="inline-block bg-[#4b2ba3] text-white font-semibold px-6 py-2 rounded hover:bg-[#3a2882] transition">
                        Mulai Menulis
                    </a>
                </div>
            </div>
            @endif
        </main>
    </div>
    <livewire:components.footer />
</div>
