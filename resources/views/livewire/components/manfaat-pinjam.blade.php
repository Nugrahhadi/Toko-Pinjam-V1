<section class="bg-[#FFF7F3] py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <h2 class="text-center text-2xl lg:text-4xl font-extrabold text-[#433592] leading-snug mb-10"
        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      <em>{{ __('Sustainable Lifestyle') }}</em> {{ __('Bukanlah Pengorbanan.') }}<br class="hidden md:block">
      {{ __('Coba dan Rasakan Dampaknya!') }}
    </h2>

    <div class="relative">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="relative bg-[#FCE9F0] border-8 border-white rounded-xl shadow-md p-6 text-center flex flex-col">
          <div class="flex items-center justify-center mb-5" style="height: 160px;">
            <img src="{{ asset('images/sustain/1.webp') }}" alt="" class="max-w-full max-h-full object-contain">
          </div>
          <p class="text-sm lg:text-xl font-bold text-[#433592] tracking-wide mt-auto">
            {{ __('EKONOMI MELEMAH,') }}<br> {{ __('KEBUTUHAN TETAP SAMA') }}
          </p>
        </div>

        <div class="relative bg-[#6457cb] border-8 border-white rounded-xl shadow-md p-6 text-center flex flex-col">
          <div class="flex items-center justify-center mb-5" style="height: 160px;">
            <img src="{{ asset('images/sustain/2.webp') }}" alt="" class="max-w-full max-h-full object-contain">
          </div>
          <p class="text-sm lg:text-xl font-bold text-white tracking-wide mt-auto">
            {{ __('PINJAM KEBUTUHAN') }}<br> {{ __('DAN SIMPAN UANG-MU') }}
          </p>
        </div>

        <div class="relative bg-[#FBE2EF] border-8 border-white rounded-xl shadow-md p-6 text-center flex flex-col">
          <div class="flex items-center justify-center mb-5" style="height: 160px;">
            <img src="{{ asset('images/sustain/3.webp') }}" alt="" class="max-w-full max-h-full object-contain">
          </div>
          <div class="mt-auto">
            <p class="text-sm lg:text-xl font-bold text-[#433592] tracking-wide">
              {{ __('OVER-KONSUMSI NAIK 300%') }}<br> {{ __('DALAM 50 TAHUN') }}
            </p>
            <span class="text-xs lg:text-md text-gray-500 mt-2 block">{{ __('Sumber: OECD') }}</span>
          </div>
        </div>

        <div class="relative bg-[#6457cb] border-8 border-white rounded-xl shadow-md p-6 text-center flex flex-col">
          <div class="flex items-center justify-center mb-5" style="height: 160px;">
            <img src="{{ asset('images/sustain/4.webp') }}" alt="" class="max-w-full max-h-full object-contain rounded-lg">
          </div>
          <p class="text-sm lg:text-xl font-bold text-white tracking-wide mt-auto">
            {{ __('SHARING BERSAMA SAHABAT,') }}<br> {{ __('JADI RAMAH LINGKUNGAN') }}
          </p>
        </div>
      </div>

      <img src="{{ asset('images/sustain/panah.png') }}"
           class="ml-6 hidden lg:block absolute top-1/2 left-[calc(25%-2rem)] -translate-y-1/2 -translate-x-1/2"
           style="width: 90px; height: auto;" alt="arrow">

      <img src="{{ asset('images/sustain/panah.png') }}"
           class="mr-4 hidden lg:block absolute top-1/2 right-[calc(25%-2rem)] -translate-y-1/2 translate-x-1/2"
           style="width: 90px; height: auto;" alt="arrow">
    </div>

<div class="mt-14 bg-[#A8EAF6] rounded-xl p-6 md:p-8">
  <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] md:gap-x-6 items-center">

    <div class="flex justify-center md:justify-center mb-4 md:mb-0">
      <img src="{{ asset('images/sustain/5.webp') }}" 
           alt="People" 
           class="max-w-[250px] md:max-w-[300px] w-full h-auto">
    </div>

    <div class="flex flex-col items-center md:items-start space-y-4 mt-4 md:mt-0">
      <div class="text-center md:text-left">
        <h3 class="text-[#433592] font-extrabold text-3xl md:text-5xl mb-2"
            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
          {{ __('100% Orang Butuh Toko Pinjam') }}
        </h3>
        <p class="text-gray-700 text-base md:text-xl">
          {{ __('25 dari 25 orang yang kami survey secara mandiri mengatakan dua hal:') }}
        </p>
      </div>

      <div class="flex justify-center md:justify-start w-full">
        <img src="{{ asset('images/sustain/6.png') }}" 
             alt="Quotes" 
             class="max-w-full md:max-w-xl w-full h-auto">
      </div>
    </div>
  </div>
</div>


  </div>
</section>
