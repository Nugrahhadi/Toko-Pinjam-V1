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
                        <h3 class="text-xl font-bold text-gray-900 mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Tim Penulis
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Author -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="font-semibold text-gray-900 mb-2">Penulis:</h4>
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 bg-[#433592] rounded-full flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($post->author, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $post->author }}</p>
                                        @if($post->user && $post->user->email)
                                        <a href="mailto:{{ $post->user->email }}" class="text-[#433592] hover:underline text-sm">
                                            {{ $post->user->email }}
                                        </a>
                                        @endif
                                        @if($post->author_phone)
                                        <p class="text-gray-600 text-sm">{{ $post->author_phone }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Editor -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="font-semibold text-gray-900 mb-2">Editor:</h4>
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center text-white font-bold">
                                        TP
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Tim Toko Pinjam</p>
                                        <a href="mailto:admin@tokopinjam.com" class="text-[#433592] hover:underline text-sm">
                                            admin@tokopinjam.com
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                                                       $index === 1 ? 'bg-gray-400 text-white' : 
                                                       $index === 2 ? 'bg-orange-400 text-white' : 'bg-gray-300 text-gray-600' }}">
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
                                    <a href="{{ route('blog.detail', $recentPost->slug) }}" class="block">
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
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="flex-1 bg-blue-600 text-white px-3 py-2 rounded-lg text-center text-sm hover:bg-blue-700 transition">
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" 
                                   target="_blank"
                                   class="flex-1 bg-sky-500 text-white px-3 py-2 rounded-lg text-center text-sm hover:bg-sky-600 transition">
                                    Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" 
                                   target="_blank"
                                   class="flex-1 bg-green-600 text-white px-3 py-2 rounded-lg text-center text-sm hover:bg-green-700 transition">
                                    WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Newsletter Subscription -->
                        <div class="bg-gradient-to-br from-[#FDF2EB] to-[#FEF7F0] border border-[#433592]/20 rounded-xl p-6">
                            <h3 class="text-lg font-bold text-[#433592] mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                📧 Newsletter
                            </h3>
                            <p class="text-sm text-gray-600 mb-4">
                                Dapatkan update artikel terbaru dan promo menarik langsung di email kamu!
                            </p>
                            <form class="space-y-3">
                                <input type="email" 
                                       placeholder="Alamat email kamu"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#433592] focus:outline-none">
                                <button type="submit" 
                                        class="w-full bg-[#433592] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#3A2B7A] transition">
                                    Berlangganan
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @livewire('components.footer')
</div>
