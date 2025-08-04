<nav class="shadow-sm" x-data style="background-color: #fffaf7;">
    <!-- Top notification bar -->
    <div class="px-4 py-2" style="background-color: #FFC131; color: #433592;">
        <div class="max-w-7xl mx-auto flex items-center justify-between text-sm">
            <div class="flex items-center">
                <span class="mr-2">💡</span>
                <span class="font-semibold">Untuk dompetmu, lingkunganmu, dan kamu</span>
            </div>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" 
                           wire:model.live.debounce.300ms="search"
                           placeholder="Mau cari apa?" 
                           class="pl-8 pr-4 py-1 text-sm border border-gray-300 rounded-md focus:outline-none bg-white text-gray-900 placeholder-gray-500"
                           style="--tw-ring-color: #433592; border-color: #433592;">
                    <svg class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Main navbar -->
    <div class="max-w-7xl mx-auto px-4 mt-4 sm:px-6 lg:px-8">
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
                    <a href="{{ route('pinjam-sekarang') }}" class="text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Pinjam Sekarang</a>
                    
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
                                <a href="{{ route('chapter-purwokerto') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Purwokerto</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Yogyakarta</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Surabaya</a>
                            </div>
                        </div>
                    </div>

                   
                    
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
                            
                                <a href="{{ route('super-team') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">The Super Team</a>
                                <a href="{{ route('laporan-keuangan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Laporan Keuangan</a>
                                <a href="{{ route('blog') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Blog</a>
                                <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">FAQ</a>
                                <a href="{{ route('kontak') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Kontak</a>
                                 <a href="{{ route('ai-usage') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#FDF2EB] hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Acknowledgement of AI Usage</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right side button -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Donasi Button -->
                <a href="{{ route('donasi') }}" 
                class="flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105" style="font-family: 'Google Sans', 'Product Sans', sans-serif;" title="Donasi untuk Toko Pinjam">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Donasi
                </button>
                
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 font-medium hover:text-[#433592] transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span style="color: #433592;">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <!-- User Info -->
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-gray-500" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ auth()->user()->email }}</p>
                                    <span class="inline-flex items-center px-2 py-1 mt-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </span>
                                </div>
                                
                                <!-- Menu Items -->
                                {{-- <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                    </svg>
                                    Dashboard
                                </a> --}}
                                
                                <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profil Saya
                                </a>
                                
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Riwayat Pinjaman
                                </a>
                                
                                <div class="border-t border-gray-100 my-1"></div>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login.custom') }}" class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Login</a>
                    <a href="{{ route('register.custom') }}" class="text-white px-6 py-2 rounded-md font-medium transition-colors" style="background-color: #433592;" onmouseover="this.style.backgroundColor='#3A2B7A'" onmouseout="this.style.backgroundColor='#433592'">
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
                    <!-- Mobile Auth Menu -->
                    <div class="border-t border-gray-200 pt-3">
                        <!-- User Info -->
                        <div class="px-3 py-2 border-b border-gray-100 mb-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ auth()->user()->email }}</p>
                                    <span class="inline-flex items-center px-2 py-0.5 mt-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Menu Items -->
                        {{-- <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-gray-700 font-medium hover:text-[#433592] hover:bg-gray-50 transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                            Dashboard
                        </a> --}}
                        
                        <a href="{{ route('profile') }}" class="flex items-center px-3 py-2 text-gray-700 font-medium hover:text-[#433592] hover:bg-gray-50 transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profil Saya
                        </a>
                        
                        <a href="#" class="flex items-center px-3 py-2 text-gray-700 font-medium hover:text-[#433592] hover:bg-gray-50 transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Riwayat Pinjaman
                        </a>
                        
                        <div class="border-t border-gray-100 mt-2 pt-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-3 py-2 text-red-600 font-medium hover:text-red-700 hover:bg-red-50 transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login.custom') }}" class="block px-3 py-2 text-gray-700 font-medium hover:text-[#433592] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Masuk</a>
                    <a href="{{ route('register.custom') }}" class="block px-3 py-2 text-white rounded-md font-medium text-center bg-[#433592] hover:bg-[#3A2B7A] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Buat Akun</a>
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
