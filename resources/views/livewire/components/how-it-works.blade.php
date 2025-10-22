<section id="how-it-works" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-2xl lg:text-3xl text-gray-900 mb-4 font-extrabold" style="color: #433592; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Aku Mau Pinjam. Gimana Caranya?
            </h2>
        </div>

        {{-- DESKTOP VERSION - Grid Layout (Step 1-3, then 4-5) --}}
        <div class="hidden md:block">
            {{-- First Row: Steps 1-3 --}}
            <div class="grid md:grid-cols-3 gap-12 mb-16">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mx-auto" style="width: 280px; height: 280px;">
                        <img src="{{ asset('images/howitworks/1.png') }}"
                             alt="Join & start learning"
                             class="w-full h-full object-cover shadow-lg border-4 border-white"
                             style="border-radius: 24px;">
                        <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                             style="top: -15px; right: -15px; width: 60px; height: 60px; background-color: #413291; border-radius: 50%; font-size: 32px;">
                            1
                        </div>
                    </div>
                    <h3 class="text-lg font-bold mt-9 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Buat akun
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed max-w-xs">
                        Isi formulir singkat untuk bergabung dalam sebuah lifestyle baru yang sehat untuk kamu, dan dompetmu. Konfirmasi akun kamu akan dikirim via WhatsApp dalam 24 jam setelah pengajuan.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mx-auto" style="width: 280px; height: 280px;">
                        <img src="{{ asset('images/howitworks/2.png') }}"
                             alt="Reserve & rent"
                             class="w-full h-full object-cover shadow-lg border-4 border-white"
                             style="border-radius: 24px;">
                        <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                             style="top: -15px; right: -15px; width: 60px; height: 60px; background-color: #413291; border-radius: 50%; font-size: 32px;">
                            2
                        </div>
                    </div>
                    <h3 class="text-lg font-bold mt-9 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Cari dan Pinjam
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed max-w-xs">
                        Periksa ketersediaan barang dan pinjam di website ini. Oiya, kamu juga bisa lihat instagram toko pinjam daerah kamu untuk tau barang apa saja yang tersedia.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mx-auto" style="width: 280px; height: 280px;">
                        <img src="{{ asset('images/howitworks/3.png') }}"
                             alt="Return & share"
                             class="w-full h-full object-cover shadow-lg border-4 border-white"
                             style="border-radius: 24px;">
                        <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                             style="top: -15px; right: -15px; width: 60px; height: 60px; background-color: #413291; border-radius: 50%; font-size: 32px;">
                            3
                        </div>
                    </div>
                    <h3 class="text-lg font-bold mt-9 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Yuk Berdonasi
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed max-w-xs">
                        Dalam menyediakan layanan ini, kami bekerja secara sukarela. Donasi kamu akan membantu kami tetap hidup agar kamu, teman kamu, semua orang di sekelilingmu juga bisa rasakan manfaat ini.
                    </p>
                </div>
            </div>

            {{-- Second Row: Steps 4-5 with side images --}}
            <div class="flex justify-center items-start gap-11">
                <!-- Gambar Kiri -->
                <div>
                    <img src="{{ asset('images/howitworks/karaokee.png') }}"
                         alt="Gambar Kiri"
                         class="w-full h-40">
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mx-auto" style="width: 280px; height: 280px;">
                        <img src="{{ asset('images/howitworks/4.png') }}"
                             alt="Ambil Barang"
                             class="w-full h-full object-cover shadow-lg border-4 border-white"
                             style="border-radius: 24px;">
                        <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                             style="top: -15px; right: -15px; width: 60px; height: 60px; background-color: #413291; border-radius: 50%; font-size: 32px;">
                            4
                        </div>
                    </div>
                    <h3 class="text-lg font-bold mt-9 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Ambil Barang
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed max-w-xs">
                        Datang ke lokasi toko pinjam di kota kamu dan ambil barangnya. Jangan lupa bawa KTP/SIM untuk dititipkan ya!
                    </p>
                </div>

                <!-- Step 5 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mx-auto" style="width: 280px; height: 280px;">
                        <img src="{{ asset('images/howitworks/5.jpg') }}"
                             alt="Kembalikan Barang"
                             class="w-full h-full object-cover shadow-lg border-4 border-white"
                             style="border-radius: 24px;">
                        <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                             style="top: -15px; right: -15px; width: 60px; height: 60px; background-color: #413291; border-radius: 50%; font-size: 32px;">
                            5
                        </div>
                    </div>
                    <h3 class="text-lg font-bold mt-9 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Kembalikan Barang
                    </h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed max-w-xs">
                        Sudah selesai, datang lagi ke lokasi kamu meminjam dan kembalikan barangnya ya. Karena teman-teman kita yang lain juga mau pakai barangnya setelah kamu.
                    </p>
                </div>

                <!-- Gambar Kanan -->
                <div>
                   <img src="{{ asset('images/howitworks/bumii.png') }}"
                         alt="Gambar Kanan"
                         class="w-full h-40">
                </div>
            </div>
        </div>

        {{-- MOBILE VERSION - Vertical Layout (All Steps 1-5) --}}
        <div class="block md:hidden space-y-12">
            <!-- Step 1 -->
            <div class="flex flex-col items-center text-center">
                <div class="relative mx-auto" style="width: 240px; height: 240px;">
                    <img src="{{ asset('images/howitworks/1.png') }}"
                         alt="Join & start learning"
                         class="w-full h-full object-cover shadow-lg border-4 border-white"
                         style="border-radius: 20px;">
                    <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                         style="top: -12px; right: -12px; width: 50px; height: 50px; background-color: #413291; border-radius: 50%; font-size: 24px;">
                        1
                    </div>
                </div>
                <h3 class="text-base font-bold mt-6 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Buat akun
                </h3>
                <p class="text-gray-600 mt-3 text-xs leading-relaxed px-4">
                    Isi formulir singkat untuk bergabung dalam sebuah lifestyle baru yang sehat untuk kamu, dan dompetmu. Konfirmasi akun kamu akan dikirim via WhatsApp dalam 24 jam setelah pengajuan.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center text-center">
                <div class="relative mx-auto" style="width: 240px; height: 240px;">
                    <img src="{{ asset('images/howitworks/2.png') }}"
                         alt="Reserve & rent"
                         class="w-full h-full object-cover shadow-lg border-4 border-white"
                         style="border-radius: 20px;">
                    <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                         style="top: -12px; right: -12px; width: 50px; height: 50px; background-color: #413291; border-radius: 50%; font-size: 24px;">
                        2
                    </div>
                </div>
                <h3 class="text-base font-bold mt-6 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Cari dan Pinjam
                </h3>
                <p class="text-gray-600 mt-3 text-xs leading-relaxed px-4">
                    Periksa ketersediaan barang dan pinjam di website ini. Oiya, kamu juga bisa lihat instagram toko pinjam daerah kamu untuk tau barang apa saja yang tersedia.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center text-center">
                <div class="relative mx-auto" style="width: 240px; height: 240px;">
                    <img src="{{ asset('images/howitworks/3.png') }}"
                         alt="Return & share"
                         class="w-full h-full object-cover shadow-lg border-4 border-white"
                         style="border-radius: 20px;">
                    <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                         style="top: -12px; right: -12px; width: 50px; height: 50px; background-color: #413291; border-radius: 50%; font-size: 24px;">
                        3
                    </div>
                </div>
                <h3 class="text-base font-bold mt-6 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Yuk Berdonasi
                </h3>
                <p class="text-gray-600 mt-3 text-xs leading-relaxed px-4">
                    Dalam menyediakan layanan ini, kami bekerja secara sukarela. Donasi kamu akan membantu kami tetap hidup agar kamu, teman kamu, semua orang di sekelilingmu juga bisa rasakan manfaat ini.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col items-center text-center">
                <div class="relative mx-auto" style="width: 240px; height: 240px;">
                    <img src="{{ asset('images/howitworks/4.png') }}"
                         alt="Ambil Barang"
                         class="w-full h-full object-cover shadow-lg border-4 border-white"
                         style="border-radius: 20px;">
                    <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                         style="top: -12px; right: -12px; width: 50px; height: 50px; background-color: #413291; border-radius: 50%; font-size: 24px;">
                        4
                    </div>
                </div>
                <h3 class="text-base font-bold mt-6 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Ambil Barang
                </h3>
                <p class="text-gray-600 mt-3 text-xs leading-relaxed px-4">
                    Datang ke lokasi toko pinjam di kota kamu dan ambil barangnya. Jangan lupa bawa KTP/SIM untuk dititipkan ya!
                </p>
            </div>

            <!-- Step 5 -->
            <div class="flex flex-col items-center text-center">
                <div class="relative mx-auto" style="width: 240px; height: 240px;">
                    <img src="{{ asset('images/howitworks/5.jpg') }}"
                         alt="Kembalikan Barang"
                         class="w-full h-full object-cover shadow-lg border-4 border-white"
                         style="border-radius: 20px;">
                    <div class="absolute flex items-center justify-center text-white font-bold border-4 border-white shadow-lg" 
                         style="top: -12px; right: -12px; width: 50px; height: 50px; background-color: #413291; border-radius: 50%; font-size: 24px;">
                        5
                    </div>
                </div>
                <h3 class="text-lg font-bold mt-6 text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Kembalikan Barang
                </h3>
                <p class="text-gray-600 mt-3 text-sm leading-relaxed px-4">
                    Sudah selesai, datang lagi ke lokasi kamu meminjam dan kembalikan barangnya ya. Karena teman-teman kita yang lain juga mau pakai barangnya setelah kamu.
                </p>
            </div>
        </div>
    </div>
</section>