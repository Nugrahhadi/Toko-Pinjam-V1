<x-app-layout>
    <div class="min-h-screen" style="background: linear-gradient(135deg, #433592 0%, #5B4B8A 50%, #FDF2EB 100%);">
        <!-- Main Content -->
        <div class="relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-20 left-10 w-32 h-32 bg-yellow-300 rounded-full opacity-20 animate-pulse"></div>
                <div class="absolute top-40 right-20 w-24 h-24 bg-white rounded-full opacity-10 animate-bounce"></div>
                <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-yellow-400 rounded-full opacity-30"></div>
                <div class="absolute bottom-40 right-1/3 w-20 h-20 bg-purple-300 rounded-full opacity-20"></div>
            </div>

            <!-- Content Container -->
            <div class="relative z-10 pt-16 pb-20 px-4">
                <div class="max-w-4xl mx-auto text-center">
                    
                    <!-- Logo -->
                    <div class="mb-8 flex justify-center">
                        <div class="bg-white rounded-full p-6 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('images/logo-toko-pinjam.png') }}" 
                                 alt="Toko Pinjam" 
                                 class="h-20 w-auto max-w-[200px] object-contain">
                        </div>
                    </div>

                    <!-- Welcome Badge -->
                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full text-purple-800 font-bold text-sm mb-6 shadow-lg transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Selamat Datang!
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Anda Sudah Menjadi<br>
                        <span class="bg-gradient-to-r from-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                            Bagian dari Kami!
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Terima kasih telah bergabung dalam gerakan berbagi dan peduli lingkungan bersama 
                        <span class="font-bold text-yellow-300">Toko Pinjam</span>! 🌱
                    </p>

                    <!-- User Info Card -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 mb-8 max-w-md mx-auto border border-white/20 shadow-xl">
                        <div class="flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-purple-800" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ auth()->user()->name ?? 'Sobat Toko Pinjam' }}</h3>
                        <p class="text-purple-200 text-sm">{{ auth()->user()->email ?? '' }}</p>
                        <div class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 rounded-full text-white text-sm font-medium">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                            Status: Aktif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <!-- Pinjam Sekarang -->
                        <a href="{{ route('all-items') }}" 
                           class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-purple-800 mb-2">Pinjam Sekarang</h3>
                            <p class="text-sm text-gray-600">Jelajahi berbagai barang yang bisa kamu pinjam</p>
                        </a>

                        <!-- Profile -->
                        <a href="{{ route('profile') }}" 
                           class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-purple-800 mb-2">Profil Saya</h3>
                            <p class="text-sm text-gray-600">Kelola profil dan riwayat peminjaman</p>
                        </a>

                        <!-- Donasi -->
                        <a href="{{ route('donasi') }}" 
                           class="group bg-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-red-500 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-purple-800 mb-2">Donasi</h3>
                            <p class="text-sm text-gray-600">Dukung gerakan berbagi kami</p>
                        </a>
                    </div>

                    <!-- Bottom Quote -->
                    <div class="mt-12 max-w-2xl mx-auto">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <p class="text-lg text-white italic mb-2">"Untuk dompetmu, lingkunganmu, dan kamu"</p>
                            <p class="text-purple-200 text-sm">Mari bersama-sama menciptakan perubahan positif! 🌍</p>
                        </div>
                    </div>

                    <!-- Back to Home -->
                    <div class="mt-8">
                        <a href="{{ route('home') }}" 
                           class="inline-flex items-center text-white hover:text-yellow-300 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
