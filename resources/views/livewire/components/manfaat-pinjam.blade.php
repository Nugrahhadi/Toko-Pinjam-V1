<section class="bg-[#FFF7F3] py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HEADLINE --}}
    <h2 class="text-center text-4xl font-extrabold text-[#433592] leading-snug mb-10"
        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      <em>Sustainable Lifestyle</em> Bukanlah Pengorbanan.<br class="hidden md:block">
      Coba dan Rasakan Dampaknya!
    </h2>

    {{-- 4 CARDS --}}
    <div class="relative">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        {{-- Card 1 --}}
        <div class="relative bg-[#FCE9F0] border-8 border-white rounded-xl shadow-md p-6 text-center">
          <img src="{{ asset('images/sustain/1.png') }}" alt="" class="mx-auto mb-5 w-40 h-40 object-contain">
          <p class="text-xl font-bold text-[#433592] tracking-wide">
            EKONOMI MELEMAH,<br> KEBUTUHAN TETAP SAMA
          </p>
        </div>

        {{-- Card 2 --}}
        <div class="relative bg-[#6457cb] border-8 border-white rounded-xl shadow-md p-6 text-center">
          <img src="{{ asset('images/sustain/2.png') }}" alt="" class="mx-auto mb-5 w-40 h-40 object-contain">
          <p class="text-xl font-bold text-white tracking-wide">
            PINJAM KEBUTUHAN<br> DAN SIMPAN UANG-MU
          </p>
        </div>

        {{-- Card 3 --}}
        <div class="relative bg-[#FBE2EF] border-8 border-white rounded-xl shadow-md p-6 text-center">
          <img src="{{ asset('images/sustain/3.png') }}" alt="" class="mx-auto mb-5 w-40 h-40 object-contain">
          <p class="text-xl font-bold text-[#433592] tracking-wide">
            OVER-KONSUMSI NAIK 300%<br> DALAM 50 TAHUN
          </p>
          <span class="text-md text-gray-500 mt-2 block">Sumber: OECD</span>
        </div>

        {{-- Card 4 --}}
<div class="relative bg-[#6457cb] border-8 border-white rounded-xl shadow-md pt-6 px-0 pb-6 text-center">
  <img src="{{ asset('images/sustain/4.png') }}" 
       alt="" 
       class="w-full h-30 object-cover rounded-t-xl">
  <p class="text-xl pt-8 font-bold text-white tracking-wide px-6">
    SHARING BERSAMA SAHABAT,<br> JADI RAMAH LINGKUNGAN
  </p>
</div>
      </div>

      {{-- PANAH 1 -> 2 --}}
      <img src="{{ asset('images/sustain/panah.png') }}"
           class="ml-6 hidden lg:block absolute top-1/2 left-[calc(25%-2rem)] -translate-y-1/2 -translate-x-1/2"
           style="width: 90px; height: auto;" alt="arrow">

      {{-- PANAH 3 -> 4 --}}
      <img src="{{ asset('images/sustain/panah.png') }}"
           class="mr-4 hidden lg:block absolute top-1/2 right-[calc(25%-2rem)] -translate-y-1/2 translate-x-1/2"
           style="width: 90px; height: auto;" alt="arrow">
    </div>

   {{-- BLOK BIRU --}}
<div class="mt-14 bg-[#A8EAF6] rounded-xl p-6 md:p-8">
  <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] md:gap-x-6 items-center">
    
    {{-- Gambar Orang (5.png) --}}
    <div class="flex justify-center md:justify-start pr-10">
      <img src="{{ asset('images/sustain/5.png') }}" 
           alt="People" 
           class="max-w-[300px] md:max-w-[300px] w-full h-auto">
    </div>

    {{-- Judul + Bubble Chat --}}
    <div class="flex flex-col items-center md:items-start space-y-2 mt-4 md:mt-0">
      <div class="text-left">
        <h3 class="text-[#433592] font-extrabold text-5xl mb-1"
            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
          100% Orang Butuh Toko Pinjam
        </h3>
        <p class="text-gray-700 text-xl">
          25 dari 25 orang yang kami survey secara mandiri mengatakan dua hal:
        </p>
      </div>

      {{-- Bubble Chat (6.png) --}}
      <div class="mt-2">
        <img src="{{ asset('images/sustain/6.png') }}" 
             alt="Quotes" 
             class="max-w-xl w-full h-300">
      </div>
    </div>
  </div>
</div>


  </div>
</section>
