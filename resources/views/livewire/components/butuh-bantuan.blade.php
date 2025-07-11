<div>
  
  <!-- SECTION 1 -->
  <section class="bg-white py-12 w-full">
    <div class="flex justify-center w-full items-stretch">
      
  
      <!-- Kotak Div Isi -->
      <div class="bg-[#FDF5F2] rounded-lg shadow p-8 flex-1 max-w-6xl w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
          
          <!-- Left Content -->
          <div>
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
              Kami Butuh Uluran Tanganmu
            </h2>
            <p class="text-gray-700 mb-4 text-base md:text-lg leading-relaxed">
              Seluruh layanan kami dikerjakan secara sukarela tanpa ada perhitungan bisnis sama sekali.
            </p>
            <p class="text-gray-700 mb-6 text-base md:text-lg leading-relaxed">
              Kami mengajak kamu untuk ikut bergerak bersama dalam gerakan ini dengan memberikan donasi dalam jumlah berapapun dan bentuk apapun!
            </p>
            <div class="flex flex-wrap gap-4">
              <a href="https://www.tokopinjam.com/donasi" target="_blank"
                 class="inline-block bg-[#413291] text-white font-semibold px-5 py-2 rounded hover:bg-[#2e2367] transition">
                Donasi Sekarang
              </a>
              <a href="https://www.tokopinjam.com/daftar-donatur" target="_blank"
                 class="inline-block bg-[#413291] text-white font-semibold px-5 py-2 rounded hover:bg-[#2e2367] transition">
                Daftar Donatur Kami
              </a>
            </div>
          </div>
          
          <!-- Right Content Grid -->
          <div class="relative grid grid-cols-1 md:grid-cols-2 gap-2">
            <!-- Overlay teks -->
            <div class="absolute inset-0 flex justify-center items-center z-10">
              <span class="text-[#413291] text-xl md:text-xl font-bold px-4 py-2 bg-yellow-400 transform" style="rotate: 5deg;">
                Our Founders
              </span>
            </div>
            <!-- Gambar 1 -->
            <img src="{{ asset('images/butuhbantuan/111.jpg') }}"
                 alt="Photo 1"
                 class="w-full h-40 object-cover rounded-lg col-span-1 md:col-span-2">
            <!-- Gambar 2 -->
            <img src="{{ asset('images/butuhbantuan/22.jpg') }}"
                 alt="Photo 2"
                 class="w-full h-32 object-cover rounded-lg">
            <!-- Gambar 3 -->
            <img src="{{ asset('images/butuhbantuan/33.jpg') }}"
                 alt="Photo 3"
                 class="w-full h-32 object-cover rounded-lg">
          </div>
        </div>
      </div>
    
    
    </div>
  </section>

  <!-- SECTION 2 -->
  <section class="bg-[#A8EAF6] py-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="relative w-full h-[250px] overflow-hidden">
        
        <!-- Teks di tengah absolute -->
        <div class="absolute inset-0 flex justify-center items-center">
          <div class="text-center">
            <h3 class="whitespace-nowrap text-3xl md:text-4xl font-extrabold text-[#413291] mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
              Kamu berhak tahu untuk apa donasimu digunakan
            </h3>
            <a href="https://www.tokopinjam.com/laporan-keuangan" target="_blank"
               class="inline-block bg-[#413291] text-white font-semibold px-6 py-3 rounded hover:bg-[#2e2367] transition">
              Lihat Laporan Keuangan Kami
            </a>
          </div>
        </div>
        
        <!-- Gambar absolute bottom right -->
        <img src="{{ asset('images/butuhbantuan/laporankeuangan.png') }}"
             alt="Laporan Keuangan"
             class="hidden md:block absolute bottom-0 right-0 h-30 md:h-36 w-auto object-contain">
        
      </div>
      
    </div>
  </section>

</div>
