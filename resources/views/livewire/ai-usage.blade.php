<div>
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Main Content -->
    <section class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Acknowledgement Section -->
            <section class="bg-white py-12">
 <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-700 text-justify relative">

    <!-- Ikon di pojok kanan atas -->
    <div class="absolute top-0 right-0 mt-2 mr-2 sm:mt-4 sm:mr-6 lg:mr-8">
        <img src="{{ asset('images/aiusage/judul.png') }}"
                             alt="Photo 3"
                             class="w-full h-36 object-cover rounded-lg">

    </div>

    <!-- Judul -->
    <h2 class="text-3xl md:text-4xl font-extrabold text-[#413291] mb-10" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      Acknowledgement<br>
      of Artificial<br>
      Intelligence (AI)<br>
      Usage
    </h2>

    <!-- Paragraf -->
    <div class="space-y-4 text-base md:text-lg leading-relaxed">
      <p>
        Dalam pembuatan laman ini, kami menggunakan AI sebagai alat bantu sehingga proses menjadi lebih cepat dan murah. AI digunakan dalam memproduksi ilustrasi grafis dan proses touch up foto produk kami. Jenis AI yang digunakan adalah Large Language Models yaitu ChatGPT.
      </p>
      <p>
        Mohon diingat bahwa kami adalah sebuah nonprofit organization yang menyediakan peminjaman barang-barang kebutuhan dengan harga sangat murah. Setiap operasional kami tidak melalui perhitungan bisnis dan bersifat sukarela. Maka dari itu, menggunakan AI sebagai alat bantu menjadi opsi yang realistis bagi kami untuk menghadirkan produk yang berkualitas dengan tetap menekan biaya produksi.

      </p>
      <p>
        Tentu kami sadar bahwa penggunaan AI mengonsumsi listrik yang tidak sedikit dan hal ini merupakan sebuah concern untuk lingkungan kita. Maka dari itu, kami berkomitmen untuk melakukan transisi ke arah yang lebih environmentally friendly dengan memberdayakan sahabat-sahabat kami.

      </p>
      <p>
        Namun demikian, kami merasa bertanggung jawab dalam melaporkan hal ini untuk menjaga integritas kami sebagai sebuah organisasi. Di luar dari yang telah disebutkan, semua dikerjakan oleh
        <a href="{{ route('super-team') }}" class="text-[#413291] font-semibold underline hover:text-[#332066]">the Super Team</a> 
        yang tak kenal waktu menghadirkan ke dunia nyata, Toko Pinjam.
      </p>
    </div>

  </div>
</section>


            <!-- Super Team Section -->
            <div class="bg-[#FDF5F2] rounded-lg shadow-md p-8">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-5xl font-extrabold text-[#413291] mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Ingin Jadi Bagian dari<br>
                            the Super Team?
                        </h3>

                        <p class="text-gray-700 text-sm mb-6">
                            Kami selalu membuka kesempatan untuk siapapun yang tertarik bergabung bersama the Super Team. <br>Daftarkan dirimu sekarang!
                        </p>

                        <a href="{{ route('bergabung-super-team') }}" class="inline-block bg-[#413291] text-xl text-white px-4 py-2 rounded-lg font-bold hover:bg-[#332066] transition duration-200">
                            Daftar Sekarang
                        </a>
                    </div>

                    <!-- Illustration -->
                    <!-- IKON -->
            <div class="flex justify-center md:justify-end">
                
                    <img src="{{ asset('images/aiusage/bumi.png') }}"
                             alt="Photo 3"
                             class="w-full h-64 object-cover rounded-lg">
            </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Butuh Bantuan Section -->
    <section class="bg-white py-12 w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#FDF5F2] rounded-lg shadow-md p-8">
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

    <!-- Footer -->
    <livewire:components.footer />
</div>
