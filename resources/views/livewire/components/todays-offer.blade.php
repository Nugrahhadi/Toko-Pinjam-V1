<section class="py-16 bg-white relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Content Container -->
        <div class="relative">
            <!-- Today's Offer Badge (positioned above the cream box) -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 z-20">
                <div class="bg-[#433592] text-white px-8 py-3 rounded-lg shadow-lg">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">🎉</span>
                        <h2 class="text-2xl lg:text-4xl font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            TODAY'S OFFER
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Main Cream Box -->
            <div class="bg-[#FDF2EB] rounded-xl shadow-xl overflow-hidden relative z-10 pt-6" style="box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);">
                <div class="grid lg:grid-cols-5 items-center min-h-[400px]">
                    <!-- Left Image (2 columns) -->
                    <div class="lg:col-span-2 lg:order-1 flex items-center justify-center h-full">
                        <div class="relative w-full h-full flex items-center justify-center p-6">
                            <img src="{{ asset('images/todayOffer.png') }}" 
                                 alt="Today's Offer - Gratis Pinjam Pertama Kali" 
                                 class="w-full max-w-sm h-auto object-contain">
                        </div>
                    </div>
                    
                    <!-- Right Content (3 columns) -->
                    <div class="lg:col-span-3 lg:order-2 p-6 lg:p-8 flex flex-col justify-center">
                        <div class="space-y-4">
                            <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                GRATIS PINJAM<br>
                                PERTAMA KALI
                            </h1>
                            
                            <div class="space-y-3">
                                <p class="text-md text-[#433592] leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Peminjaman pertama setiap akun adalah <strong>GRATIS</strong>. 
                                    Kamu tetap perlu bayar donasi minimal, namun 
                                    nantinya akan dikembalikan saat pengambilan 
                                    barang.
                                </p>
                                
                                <p class="text-md font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Promo ini berlaku untuk semua barang, 
                                    tanpa terkecuali.
                                </p>
                                
                                <p class="text-md text-[#433592] mt-3" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Daftarkan kamu, dan teman-teman mu SEKARANG!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Purple Section with Buttons -->
                <div class="bg-[#433592] px-8 py-6">
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                        <button class="px-8 py-3 bg-[#FDF2EB] text-[#433592] font-bold rounded-lg hover:bg-white transition-all duration-300 shadow-md" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Register
                        </button>
                        
                        <span class="text-white font-medium text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Atau
                        </span>
                        
                        <button class="px-8 py-3 bg-transparent text-[#FDF2EB] font-bold rounded-lg border-2 border-[#FDF2EB] hover:bg-[#FDF2EB] hover:text-[#433592] transition-all duration-300" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
