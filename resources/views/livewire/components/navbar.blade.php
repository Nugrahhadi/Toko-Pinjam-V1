<nav class="shadow-sm" style="background-color: #fffaf7;">
    <!-- Top notification bar -->
    <div class="px-4 py-2" style="background-color: #FFC131; color: #433592;">
        <div class="max-w-7xl mx-auto flex items-center justify-between text-sm">
            <div class="flex items-center">
                <span class="mr-2">💡</span>
                <span class="font-semibold">Untuk dompetmu, lingkunganmu, dan kamu</span>
                <a href="#" class="ml-2 font-regular underline">Cari tahu lebih lanjut</a>
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
                    <a href="#" class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Pinjam Sekarang</a>
                    <a href="#" class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Lokasi</a>
                    <div class="relative">
                        <button class="text-gray-700 font-medium flex items-center" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">
                            Tentang Kami
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Right side button -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Cart -->
                <button class="text-gray-700 relative transition-colors duration-200" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'" title="Shopping Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3zm0 0l-.75-3M7 13h10M7 17a2 2 0 100 4 2 2 0 000-4zM17 17a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                    <!-- Badge item count -->
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium" style="background-color: #433592;">
                            {{ $cartCount > 99 ? '99+' : $cartCount }}
                        </span>
                    @endif
                </button>
                
                @auth
                    <div class="relative">
                        <button class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">
                            {{ auth()->user()->name }}
                        </button>
                    </div>
                @else
                    <a href="/login" class="text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Masuk</a>
                    <a href="/register" class="text-white px-6 py-2 rounded-md font-medium transition-colors" style="background-color: #433592;" onmouseover="this.style.backgroundColor='#3A2B7A'" onmouseout="this.style.backgroundColor='#433592'">
                        Buat Akun
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
                <a href="#" class="block px-3 py-2 text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">The Things</a>
                <a href="#" class="block px-3 py-2 text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Locations</a>
                <a href="#" class="block px-3 py-2 text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">About</a>
                @auth
                    <a href="#" class="block px-3 py-2 text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">{{ auth()->user()->name }}</a>
                @else
                    <a href="/login" class="block px-3 py-2 text-gray-700 font-medium" style="color: #433592;" onmouseover="this.style.color='#433592'" onmouseout="this.style.color='#6B7280'">Sign In</a>
                    <a href="/register" class="block px-3 py-2 text-white rounded-md font-medium text-center" style="background-color: #433592;">Join</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
