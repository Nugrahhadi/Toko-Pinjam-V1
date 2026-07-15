<section class="bg-[#413291] py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-md p-6 mb-10">
      <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
        {{ __('Kami frustasi ketika harus membeli mahal barang yang hanya dipakai sesekali, dan ternyata kamu juga!') }}
      </h2>
      <p class="text-gray-700">
        {{ __('Berdasarkan riset kami, 100 persen orang mengatakan pernah berada di situasi seperti ini dan menyambut baik jika ada opsi meminjam dengan harga murah.') }} 
        <span class="font-bold">{{ __('Toko Pinjam hadir untuk itu.') }}</span>
      </p>
    </div>

    <h3 class="text-2xl md:text-3xl font-extrabold text-white text-center mb-10" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      {{ __('Kenapa Lebih Baik Pinjam?') }}
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <!-- Card 1 -->
      <div class="bg-white rounded-lg shadow-md p-6 h-full relative">
        <div>
          <h4 class="text-lg font-bold text-gray-800 mb-3">
            {{ __('Jauh lebih murah') }}
          </h4>
          <p class="text-gray-700 text-sm mb-20">
            {{ __('Kalau beli sepatu seharga Rp 200 Ribu cuma untuk 4 kali pakai, itu artinya kamu keluar Rp 50.000 sekali pakai.') }} <br>
            {{ __('Di toko pinjam, cukup 10 Ribu saja! Kami menjamin harga termurah.') }}
          </p>
        </div>
        <img src="{{ asset('images/kenapapinjam/1.png') }}" alt="Murah" class="w-20 absolute right-4 bottom-4">
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 h-full relative">
        <div>
          <h4 class="text-lg font-bold text-gray-800 mb-3">
            {{ __('Ramah Lingkungan') }}
          </h4>
          <p class="text-gray-700 text-sm">
            {{ __('Dengan meminjam, kita mengurangi produksi barang baru dan limbah dari barang yang jarang terpakai. Lebih sedikit konsumsi, lebih sedikit sampah.') }}
          </p>
        </div>
        <img src="{{ asset('images/kenapapinjam/2.png') }}" alt="Ramah Lingkungan" class="w-20 absolute right-4 bottom-4">
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 h-full relative">
        <div>
          <h4 class="text-lg font-bold text-gray-800 mb-3">
            {{ __('Praktis & Bebas Ribet') }}
          </h4>
          <p class="text-gray-700 text-sm">
            {{ __('Gak perlu mikir soal penyimpanan, perawatan, atau barang nganggur di rumah. Pinjam saat butuh, kembalikan setelah pakai.') }}
          </p>
        </div>
        <img src="{{ asset('images/kenapapinjam/3.png') }}" alt="Praktis" class="w-20 absolute right-4 bottom-4">
      </div>
    </div>

    <div class="text-center">
      <a href="{{ route('tujuan-dan-visi') }}" class="text-white underline text-sm hover:text-gray-300 transition">
        {{ __('Pelajari misi dan dampak yang kami perjuangkan') }}
      </a>
    </div>

  </div>
</section>
