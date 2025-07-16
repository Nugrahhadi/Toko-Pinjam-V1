<section class="py-16 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Content Container -->
        <div class="relative">
            <!-- Today's Offer Badge (positioned above the cream box) -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 z-20">
                <div class="bg-[#433592] text-white px-8 py-3 rounded-xl shadow-lg">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">🎉</span>
                        <h2 class="text-xl lg:text-2xl font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            TODAY'S OFFER
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Main Cream Box -->
            <div class="bg-[#FDF2EB] rounded-3xl shadow-xl overflow-hidden relative z-10" style="box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);">
                <div class="grid lg:grid-cols-2 items-center min-h-[400px]">
                    <!-- Left Content -->
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div class="space-y-6">
                            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                GRATIS PINJAM<br>
                                PERTAMA KALI
                            </h1>
                            
                            <div class="space-y-4">
                                <p class="text-lg text-[#433592] leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Peminjaman pertama setiap akun adalah <strong>GRATIS</strong>. 
                                    Kamu tetap perlu bayar donasi minimal, namun 
                                    nantinya akan dikembalikan saat pengambilan 
                                    barang.
                                </p>
                                
                                <p class="text-lg font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Promo ini berlaku untuk semua barang, 
                                    tanpa terkecuali.
                                </p>
                                
                                <p class="text-base text-[#433592] mt-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Daftarkan kamu, dan teman-teman mu SEKARANG!
                                </p>
                            </div>
                            
                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center pt-4">
                                <button class="px-8 py-3 bg-[#FDF2EB] text-[#433592] font-bold rounded-lg border-2 border-[#433592] hover:bg-[#433592] hover:text-white transition-all duration-300 shadow-md" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Register
                                </button>
                                
                                <span class="text-[#433592] font-medium text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Atau
                                </span>
                                
                                <button class="px-8 py-3 bg-[#433592] text-white font-bold rounded-lg border-2 border-[#433592] hover:bg-[#3A2B7A] transition-all duration-300 shadow-md" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Image -->
                    <div class="lg:order-2 flex items-center justify-center h-full">
                        <div class="relative w-full h-full flex items-center justify-center p-8">
                            <img src="{{ asset('images/todayOffer.png') }}" 
                                 alt="Today's Offer - Gratis Pinjam Pertama Kali" 
                                 class="w-full max-w-md h-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
