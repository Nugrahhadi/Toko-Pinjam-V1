<div>
    <!-- Import Navbar -->
    @livewire('components.navbar')

    <!-- Main Content -->
    <div class="bg-white min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                
                <!-- Main Content Area -->
                <div class="lg:col-span-3">
                    <!-- Category Badge -->
                    <div class="mb-4">
                        <span class="inline-block px-4 py-2 bg-[#433592] text-white text-sm font-semibold rounded-full" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ $post->category }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ $post->title }}
                    </h1>

                    <!-- Subtitle/Description -->
                    @if($post->description)
                    <p class="text-lg text-gray-600 mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ $post->description }}
                    </p>
                    @endif

                    <!-- Meta Information -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-8 pb-6 border-b">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->created_at->format('d M Y, H:i') }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Dilihat {{ number_format($post->views) }} kali
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($post->featured_image)
                    <div class="mb-8">
                        <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    @endif

                    <!-- Blog Content -->
                    <div class="prose prose-lg max-w-none mb-12" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {!! $post->content !!}
                    </div>

                    <!-- Author & Editor Info -->
                    <div class="border-t pt-8">
                        <div class="prose prose-lg max-w-none" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <p class="text-gray-600">
                                <strong>Penulis:</strong> {{ $post->author }} - 
                                @if($post->author_email)
                                    <a href="mailto:{{ $post->author_email }}" class="text-[#433592] hover:underline">
                                        {{ $post->author_email }}
                                    </a>
                                @else
                                    <span class="text-gray-500">Email tidak tersedia</span>
                                @endif
                            </p>
                            <p class="text-gray-600 mt-2">
                                <strong>Editor:</strong> Allin Alya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-8">
                        
                        <!-- Advertisement Space -->
                        <div class="bg-gradient-to-br from-[#433592] to-[#6B46C1] rounded-xl p-6 text-white text-center">
                            <h3 class="text-lg font-bold mb-3" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Pinjam Sekarang!
                            </h3>
                            <p class="text-sm mb-4 opacity-90">
                                Butuh barang untuk acara spesial? Pinjam saja di Toko Pinjam dengan harga terjangkau!
                            </p>
                            <a href="{{ route('pinjam-sekarang') }}" class="inline-block bg-white text-[#433592] font-semibold px-4 py-2 rounded-full hover:bg-gray-100 transition">
                                Mulai Pinjam
                            </a>
                        </div>

                        <!-- Top Donors Leaderboard -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Top Donatur
                            </h3>
                            <div class="space-y-3">
                                @foreach($this->getTopDonors() as $index => $donor)
                                <div class="flex items-center gap-3 p-3 {{ $index === 0 ? 'bg-yellow-50 border border-yellow-200' : 'bg-gray-50' }} rounded-lg">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                                                    {{ $index === 0 ? 'bg-yellow-500 text-white' : 
                                                       ($index === 1 ? 'bg-gray-400 text-white' : 
                                                       ($index === 2 ? 'bg-orange-400 text-white' : 'bg-gray-300 text-gray-600')) }}">
                                            {{ $index + 1 }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $donor['name'] }}</p>
                                        <p class="text-xs text-gray-500">Rp {{ number_format($donor['amount']) }}</p>
                                    </div>
                                    @if($index === 0)
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="#" class="text-[#433592] hover:underline text-sm font-medium">
                                    Lihat semua donatur →
                                </a>
                            </div>
                        </div>

                        <!-- Recent Posts -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Artikel Terbaru
                            </h3>
                            <div class="space-y-4">
                                @foreach($this->getRecentPosts() as $recentPost)
                                <div class="group">
                                    <a href="{{ route('blog.detail', ['slug' => $recentPost->slug ?: $recentPost->id]) }}" class="block">
                                        <div class="flex gap-3">
                                            @if($recentPost->featured_image)
                                            <div class="w-16 h-16 flex-shrink-0 overflow-hidden rounded-lg">
                                                <img src="{{ asset('storage/' . $recentPost->featured_image) }}" 
                                                     alt="{{ $recentPost->title }}" 
                                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                            </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm font-medium text-gray-900 group-hover:text-[#433592] transition-colors line-clamp-2">
                                                    {{ $recentPost->title }}
                                                </h4>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    {{ $recentPost->created_at->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('blog') }}" class="text-[#433592] hover:underline text-sm font-medium">
                                    Lihat semua artikel →
                                </a>
                            </div>
                        </div>

                        <!-- Share This Article -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Bagikan Artikel
                            </h3>
                            <div class="flex gap-3">
                                <!-- Instagram -->
                                <a href="https://www.instagram.com/" 
                                   target="_blank"
                                   class="flex-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-2 rounded-lg text-center text-sm hover:from-purple-600 hover:to-pink-600 transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2.25a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-1.5 0v-.008a.75.75 0 0 1 .75-.75ZM12 7a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm0 1.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7Z"/>
                                    </svg>
                                    Instagram
                                </a>
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="flex-1 bg-blue-600 text-white px-3 py-2 rounded-lg text-center text-sm hover:bg-blue-700 transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z"/>
                                    </svg>
                                    Facebook
                                </a>
                                <!-- WhatsApp -->
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="flex-1 bg-green-600 text-white px-3 py-2 rounded-lg text-center text-sm hover:bg-green-700 transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @livewire('components.footer')
</div>
