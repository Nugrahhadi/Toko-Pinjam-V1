@php
    $impact = \App\Models\ImpactStat::first() ?? new \App\Models\ImpactStat([
        'saved_money' => 0,
        'co2_prevented' => 0,
        'waste_prevented' => 0,
    ]);
@endphp

<!-- HERO PERUBAHAN -->
<section id="hero-impact" class="bg-[#ddf9ef] py-12">
  <div class="max-w-5xl mx-auto text-center px-4">
    <h2 class="text-3xl md:text-4xl font-extrabold text-purple-900 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      {{ __('Perubahan Itu Nyata') }}
    </h2>
    <p class="text-purple-900 text-base md:text-lg mb-8">
      {{ __('Per') }} {{ $impact->updated_at ? $impact->updated_at->translatedFormat('d F Y') : '22 Agustus 2025' }}, {{ __('kami berhasil') }}
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
      <div>
        <p class="text-purple-900 text-base mb-1">{{ __('Menghemat') }}</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-money">0</h3>
        <p class="text-purple-900 mt-1">{{ __('Uang masyarakat') }}</p>
      </div>

      <div>
        <p class="text-purple-900 text-base mb-1">{{ __('Menangkal') }}</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-co2">0</h3>
        <p class="text-purple-900 mt-1">{{ __('Emisi CO2 ke atmosfer') }}</p>
      </div>

      <div>
        <p class="text-purple-900 text-base mb-1">{{ __('Mencegah') }}</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-waste">0</h3>
        <p class="text-purple-900 mt-1">{{ __('limbah terbuang') }}</p>
      </div>
    </div>

    <a href="{{ route('tujuan-dan-visi') }}" class="text-purple-900 underline text-sm md:text-base hover:text-purple-700 transition">
      {{ __('Pelajari misi dan dampak yang kami perjuangkan') }}
    </a>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.6.2/countUp.umd.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    let animated = false; 

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !animated) {
          animated = true;

          // Rupiah
          const money = new countUp.CountUp('count-money', {{ $impact->saved_money }}, {
            prefix: 'Rp ',
            separator: '.'
          });
          money.start();

          // CO2
          const co2 = new countUp.CountUp('count-co2', {{ $impact->co2_prevented }}, {
            separator: '.',
            suffix: ' kg'
          });
          co2.start();

          // Waste
          const waste = new countUp.CountUp('count-waste', {{ $impact->waste_prevented }}, {
            separator: '.',
            suffix: ' kg'
          });
          waste.start();

          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.3
    });

    observer.observe(document.querySelector("#hero-impact"));
  });
</script>
