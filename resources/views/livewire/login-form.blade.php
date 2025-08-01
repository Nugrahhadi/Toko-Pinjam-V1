<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 relative">
    {{-- Back Button --}}
    <button type="button"
            x-data
            @click="window.history.back()"
            title="Kembali ke halaman sebelumnya"
            aria-label="Kembali ke halaman sebelumnya"
            class="absolute top-4 left-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-sm border border-gray-300 rounded-full flex items-center justify-center hover:bg-white hover:shadow-lg transition-all duration-200">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    {{-- Left Side - Login Form --}}
    <div class="bg-white flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#433592] mb-2">Login</h1>
                <p class="text-sm text-gray-500">Masuk ke akun Toko Pinjam Anda</p>
            </div>

            <form wire:submit="login" class="space-y-6">
                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-[#433592] mb-2">Email</label>
                    <input type="email" 
                           id="email"
                           wire:model="email" 
                           placeholder="Masukkan email Anda" 
                           class="w-full px-4 py-3.5 border-2 border-[#433592] rounded-lg text-sm transition-all duration-200 focus:border-purple-600 focus:ring-2 focus:ring-purple-100 focus:outline-none">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-[#433592] mb-2">Password</label>
                    <div class="relative">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" 
                               id="password"
                               wire:model="password" 
                               placeholder="Masukkan password Anda" 
                               class="w-full px-4 py-3.5 pr-12 border-2 border-[#433592] rounded-lg text-sm transition-all duration-200 focus:border-purple-600 focus:ring-2 focus:ring-purple-100 focus:outline-none">
                        <button type="button" 
                                wire:click="togglePassword"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            @if($showPassword)
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            @endif
                        </button>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Forgot Password Link --}}
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Lupa password? 
                        <a href="https://wa.me/6285128050500?text=Halo%20admin%2C%20saya%20lupa%20password%20untuk%20login%20ke%20akun%20Toko%20Pinjam." 
                           target="_blank"
                           class="text-purple-600 hover:text-purple-700 font-medium underline">
                            Hubungi kami
                        </a>
                    </p>
                </div>

                {{-- Register Link --}}
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register.custom') }}" 
                           class="text-purple-600 hover:text-purple-700 font-medium underline">
                            Register
                        </a>
                    </p>
                </div>

                {{-- Submit Button --}}
                <button type="submit" 
                        class="w-full bg-[#433592] text-white py-3.5 px-6 rounded-lg font-semibold text-sm border-2 transition-all duration-200 hover:bg-purple-600 hover:text-white hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center">
                    @if($isSubmitting)
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Login...
                    @else
                        Login
                    @endif
                </button>
            </form>
        </div>
    </div>

    {{-- Right Side - "In this economy?" Section --}}
    <div class="bg-gradient-to-br from-purple-400 via-pink-400 to-blue-400 flex items-center justify-center p-8 relative overflow-hidden">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-10 text-center max-w-md relative z-10 shadow-2xl">
            <h2 class="text-4xl font-bold text-[#433592] mb-6">In this economy?</h2>
            
            <div class="space-y-4 text-left text-gray-700 mb-6">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">💰</span>
                    <p>Hidup hemat, nabung, biar ada uang untuk investasi</p>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🌎</span>
                    <p>Lindungi bumi, supaya engga kepanasan setiap hari</p>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🫴</span>
                    <p>Saling menguatkan sesama, <i>Together Apes Strong!</i></p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-[#433592] mb-4">Toko pinjam hadir untuk itu, untuk kamu</h3>
            
            <div class="flex justify-center space-x-2">
                <div class="w-3 h-3 bg-purple-400 rounded-full animate-bounce"></div>
                <div class="w-3 h-3 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                <div class="w-3 h-3 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            </div>
        </div>
        
        {{-- Background decorations --}}
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/20 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-purple-200/30 rounded-full blur-2xl"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-pink-200/40 rounded-full blur-lg"></div>
    </div>
</div>

