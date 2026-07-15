<section class="py-16 bg-white relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="relative">
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 z-20">
                <div class="bg-[#433592] text-white px-3 py-2 lg:px-8 lg:py-3 rounded-lg shadow-lg min-w-max">
                    <div class="flex items-center gap-2 whitespace-nowrap">
                        <span class="text-base lg:text-2xl">🎉</span>
                        <h2 class="text-base lg:text-4xl font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            TODAY'S OFFER
                        </h2>
                    </div>
                </div>
            </div>

            <div class="bg-[#FDF2EB] rounded-xl shadow-xl overflow-hidden relative z-10 pt-6" style="box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);">
                <div class="grid lg:grid-cols-5 items-center min-h-[400px]">
                    <div class="lg:col-span-2 lg:order-1 flex items-center justify-center h-full">
                        <div class="relative w-full h-full flex items-center justify-center p-6">
                            <img src="{{ asset('images/todayOffer.png') }}" 
                                 alt="Today's Offer - Gratis Pinjam Pertama Kali" 
                                 class="w-full max-w-sm h-auto object-contain">
                        </div>
                    </div>
                    
                    <div class="lg:col-span-3 lg:order-2 p-4 lg:p-8 flex flex-col justify-center">
                        <div class="space-y-2 lg:space-y-4">
                            <h1 class="text-3xl lg:text-6xl font-extrabold leading-tight" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('CASHBACK 50%') }}<br>
                                <h2 class="text-2xl lg:text-4xl font-extrabold leading-tight" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('PINJAM PERTAMA KALI') }}</h2>
                            </h1>

                            <div class="space-y-2 lg:space-y-3">
                                <p class="text-sm lg:text-md text-[#433592] leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ __('Peminjaman pertama setiap akun akan mendapatkan') }} <strong>{{ __('CASHBACK 50%') }}</strong>.
                                    {{ __('Kamu tetap perlu bayar penuh barang yang dipinjam, dan 50% sisanya akan dikembalikan saat pengambilan barang.') }}
                                </p>

                                <p class="text-sm lg:text-md font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ __('Promo ini berlaku untuk semua barang, tanpa terkecuali.') }}
                                </p>

                                <p class="text-sm lg:text-md text-[#433592] mt-2 lg:mt-3" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ __('Daftarkan kamu, dan teman-teman mu SEKARANG!') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-[#433592] px-4 py-4 lg:px-8 lg:py-6">
                    <div class="flex flex-wrap gap-3 lg:gap-4 items-center justify-center">
                        @auth
                            <a href="{{ route('all-items') }}" class="px-8 py-3 lg:px-12 lg:py-4 bg-transparent text-[#FDF2EB] font-bold rounded-lg border-2 border-[#FDF2EB] hover:bg-[#FDF2EB] hover:text-[#433592] transition-all duration-300 text-sm lg:text-base" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Pinjam Barang Sekarang') }}
                            </a>
                        @else
                            <a href="{{ route('register.custom') }}" class="px-6 py-2 lg:px-8 lg:py-3 bg-[#FDF2EB] text-[#433592] font-bold rounded-lg hover:bg-white transition-all duration-300 shadow-md text-sm lg:text-base" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Register') }}
                            </a>
                            
                            <span class="text-white font-medium text-sm lg:text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Atau') }}
                            </span>
                            
                            <a href="{{ route('login.custom') }}" class="px-6 py-2 lg:px-8 lg:py-3 bg-transparent text-[#FDF2EB] font-bold rounded-lg border-2 border-[#FDF2EB] hover:bg-[#FDF2EB] hover:text-[#433592] transition-all duration-300 text-sm lg:text-base" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ __('Login') }}
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
