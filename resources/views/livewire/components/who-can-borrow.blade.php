<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl overflow-hidden shadow-xl" style="background-color: #FDF2EB;">
            <div class="grid lg:grid-cols-3 items-center min-h-[280px]">
                <div class="lg:col-span-2 lg:order-1 p-6 lg:p-8 flex flex-col justify-center">
                    <h2 class="text-2xl lg:text-5xl text-[#433592] mb-3" style="font-weight: 800; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('Siapa yang boleh meminjam?') }}
                    </h2>
                    <p class="text-xs lg:text-base text-gray-700 mb-5 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('Kami menyambut mahasiswa di seluruh jenjang (D3/D4/S1/S2/S3) dari semua universitas di Indonesia untuk meminjam. Dibuktikan dengan menunjukkan Kartu Tanda Mahasiswa (KTM) saat mendaftar. Ayo bergabung! Pembuatan akun tidak dipungut biaya.') }}
                    </p>
                    <div class="flex flex-wrap gap-2 lg:gap-3 items-center">
                        @auth
                            <a href="{{ route('all-items') }}" class="px-6 py-2 lg:px-8 lg:py-3 bg-[#433592] text-white rounded-lg font-semibold hover:bg-[#3A2B7A] transition-colors text-xs lg:text-sm" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Pinjam Barang Sekarang') }}
                            </a>
                        @else
                            <a href="{{ route('register.custom') }}" class="px-4 py-2 lg:px-6 lg:py-2.5 bg-[#433592] text-white rounded-lg font-semibold hover:bg-[#3A2B7A] transition-colors text-xs lg:text-sm" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Register') }}
                            </a>
                            <span class="text-gray-600 text-xs lg:text-sm" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('atau') }}
                            </span>
                            <a href="{{ route('login.custom') }}" class="px-4 py-2 lg:px-6 lg:py-2.5 border-2 border-[#433592] text-[#433592] rounded-lg font-semibold hover:bg-[#433592] hover:text-white transition-colors text-xs lg:text-sm" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Login') }}
                            </a>
                        @endauth
                    </div>
                </div>
                
                <div class="lg:col-span-1 lg:order-2 flex items-end justify-end h-full">
                    <div class="relative w-full max-w-xl">
                        <img src="{{ asset('images/SiapaBolehPinjam.webp') }}" 
                             alt="Siapa yang boleh meminjam" 
                             class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
