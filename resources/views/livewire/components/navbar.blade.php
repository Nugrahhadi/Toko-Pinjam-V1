<nav class="shadow-sm" style="background-color: #fffaf7;">

    <!-- Main navbar -->
    <div class="max-w-7xl mx-auto px-4 pt-6 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center px-4 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('images/logo-toko-pinjam.png') }}" 
                         alt="Toko Pinjam" 
                         class="h-16 w-auto max-w-[160px] object-contain">
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <!-- Nav Pinjam Sekarang -->
                    <a href="#" class="text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Pinjam Sekarang</a>
                    
                    <!-- Dropdown Lokasi -->
                    <div class="relative group">
                        <button class="text-gray-700 font-medium hover:text-[#433592] transition-colors flex items-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Lokasi
                            <svg class="ml-1 w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu Lokasi -->
                        <div class="absolute top-full left-0 mt-1 w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Purwokerto</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Yogyakarta</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Surabaya</a>
                            </div>
                        </div>
                    </div>

                    <!-- Nav Leader Board Donatur-->
                    <a href="#" class="text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Leaderboard Donatur</a>
                    
                    <!-- Dropdown Tentang Kami -->
                    <div class="relative group">
                        <button class="text-gray-700 font-medium hover:text-[#433592] transition-colors flex items-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Tentang Kami
                            <svg class="ml-1 w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu Tentang Kami -->
                        <div class="absolute top-full left-0 mt-1 w-56 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Tujuan dan Visi</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Kenapa Mending Pinjam?</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Peraturan Meminjam</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">The Super Team</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Laporan Keuangan</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Blog</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">FAQ</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Kontak</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Acknowledgement of AI Usage</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right side button -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Donasi Button -->
                <button class="flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105" style="font-family: 'Google Sans', 'Product Sans', sans-serif;" title="Donasi untuk Toko Pinjam">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Donasi
                </button>
                
                @auth
                    <div class="relative">
                        <button class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">
                            {{ auth()->user()->name }}
                        </button>
                    </div>
                @else
                    <a href="/login" class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Login</a>
                    <a href="/register" class="text-white px-6 py-2 rounded-md font-medium transition-colors" style="background-color: #433592;" onmouseover="this.style.backgroundColor='#3A2B7A'" onmouseout="this.style.backgroundColor='#433592'">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button wire:click="toggleMenu" class="text-gray-700" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden {{ $isMenuOpen ? 'block' : 'hidden' }}">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t">
                <a href="#" class="block px-3 py-2 text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Pinjam Sekarang</a>
                
                <!-- Mobile Lokasi -->
                <div class="px-3 py-2">
                    <div class="font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Lokasi</div>
                    <div class="pl-4 space-y-1">
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Purwokerto</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Yogyakarta</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Surabaya</a>
                    </div>
                </div>
                
                <!-- Mobile Tentang Kami -->
                <div class="px-3 py-2">
                    <div class="font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Tentang Kami</div>
                    <div class="pl-4 space-y-1">
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Kenapa mending pinjam?</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Tim kami (Ide kami menembus ruang kelas)</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">FAQ</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Blog</a>
                        <a href="#" class="block py-1 text-sm text-gray-600 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Tujuan kami</a>
                    </div>
                </div>
                
                @auth
                    <a href="#" class="block px-3 py-2 text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ auth()->user()->name }}</a>
                @else
                    <a href="/login" class="block px-3 py-2 text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Masuk</a>
                    <a href="/register" class="block px-3 py-2 text-white rounded-md font-medium text-center bg-[#433592] hover:bg-[#3A2B7A] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Buat Akun</a>
                @endauth
                
                <!-- Mobile Donasi Button -->
                <div class="px-3 py-2">
                    <button class="w-full flex items-center justify-center px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-200" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        Donasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
