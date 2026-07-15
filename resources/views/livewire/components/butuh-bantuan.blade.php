<div>
  <section class="bg-white py-12 w-full">
    <div class="flex justify-center w-full items-stretch">

      <div class="bg-[#FDF5F2] rounded-lg shadow p-8 flex-1 max-w-6xl w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

          <div>
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
              {{ __('Kami Butuh Uluran Tanganmu') }}
            </h2>
            <p class="text-gray-700 mb-4 text-base md:text-lg leading-relaxed">
              {{ __('Seluruh layanan kami dikerjakan secara sukarela tanpa ada perhitungan bisnis sama sekali.') }}
            </p>
            <p class="text-gray-700 mb-6 text-base md:text-lg leading-relaxed">
              {{ __('Kami mengajak kamu untuk ikut bergerak bersama dalam gerakan ini dengan memberikan donasi dalam jumlah berapapun dan bentuk apapun!') }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('donasi') }}" 
                 class="flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105" style="font-family: 'Google Sans', 'Product Sans', sans-serif;" title="{{ __('Donasi untuk Toko Pinjam') }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    {{ __('Donasi') }}
                </a>
            </div>
          </div>

          <div class="relative grid grid-cols-2 gap-2">
            <!-- Overlay teks -->
            <div class="absolute inset-0 flex justify-center items-center z-10">
              <span class="text-[#413291] text-xl md:text-xl font-bold px-4 py-2 bg-yellow-400 transform" style="rotate: 5deg;">
                Our Founders
              </span>
            </div>
            <img src="{{ asset('images/butuhbantuan/111.JPG') }}"
                 alt="Photo 1"
                 class="w-full h-40 object-cover rounded-lg col-span-2">
            <img src="{{ asset('images/butuhbantuan/22.jpg') }}"
                 alt="Photo 2"
                 class="w-full h-32 object-cover rounded-lg">
            <img src="{{ asset('images/butuhbantuan/33.jpg') }}"
                 alt="Photo 3"
                 class="w-full h-32 object-cover rounded-lg">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
