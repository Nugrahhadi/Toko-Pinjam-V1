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
        placeholder="Cari kata kunci"
        class="w-full pl-10 pr-3 py-2 bg-[#A79C97] text-white placeholder-white rounded focus:outline-none text-sm" />
</div>

                {{-- Kategori --}}
                <div>
                    <h2 class="text-base font-bold mb-2">Kategori:</h2>
                    <ul class="space-y-2">
                        @foreach (['Siaran pers', 'Pengumuman', 'Siaran pers', 'Pengumuman'] as $item)
                            <li>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox text-[#3a2882]">
                                    <span class="ml-2">{{ $item }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                

                <hr class="border-t border-gray-400">

                {{-- CTA --}}
                <div class="text-center space-y-4 pt-2">
                    <p class="font-bold text-[#3a2882] text-2xl leading-snug">Tulisanmu<br>Bisa Terbit!</p>
                    <a href="{{ route('create-post') }}"
                        class="inline-block bg-[#4b2ba3] text-white font-semibold px-6 py-2 text-lg rounded shadow hover:bg-[#3a2882] transition">
                        Mulai Menulis
                    </a>
                </div>
            </div>
        </aside>

        {{-- KONTEN --}}
        <main class="pl-10 w-full py-10 px-6 bg-white">
            <h1 class="text-3xl font-bold text-[#3a2882] mb-8 text-center">Semua yang Perlu Kamu Tahu</h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white overflow-hidden group hover:shadow-lg transition-shadow duration-300">
                        <a href="{{ route('blog.detail', ['slug' => $post->slug ?: $post->id]) }}" class="block">
                            <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : 'https://source.unsplash.com/300x200/?random&' . $loop->index }}"
                                 alt="{{ $post->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="p-2 text-lg text-left font-semibold text-[#3a2882] group-hover:text-[#4b2ba3] transition-colors">
                                {{ $post->title }}
                            </div>
                            @if($post->description)
                            <div class="px-2 pb-2 text-sm text-gray-600 line-clamp-2">
                                {{ $post->description }}
                            </div>
                            @endif
                            <div class="px-2 pb-2 text-xs text-gray-500">
                                {{ $post->created_at->format('d M Y') }} • {{ $post->views ?? 0 }} views
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
    <livewire:components.footer />
</div>
