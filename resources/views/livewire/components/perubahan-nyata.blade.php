<!-- HERO PERUBAHAN -->
<section id="hero-impact" class="bg-[#ddf9ef] py-12">
  <div class="max-w-5xl mx-auto text-center px-4">
    <h2 class="text-3xl md:text-4xl font-extrabold text-purple-900 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
      Perubahan Itu Nyata
    </h2>
    <p class="text-purple-900 text-base md:text-lg mb-8">
      Per 22 Agustus 2025, kami berhasil
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
      <!-- Card 1 -->
      <div>
        <p class="text-purple-900 text-base mb-1">Menghemat</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-money">0</h3>
        <p class="text-purple-900 mt-1">Uang masyarakat</p>
      </div>

      <!-- Card 2 -->
      <div>
        <p class="text-purple-900 text-base mb-1">Menangkal</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-co2">0</h3>
        <p class="text-purple-900 mt-1">Emisi CO2 ke atmosfer</p>
      </div>

      <!-- Card 3 -->
      <div>
        <p class="text-purple-900 text-base mb-1">Mencegah</p>
        <h3 class="text-2xl md:text-3xl font-bold text-purple-900" id="count-waste">0</h3>
        <p class="text-purple-900 mt-1">limbah terbuang</p>
      </div>
    </div>

    <a href="#" class="text-purple-900 underline text-sm md:text-base hover:text-purple-700 transition">
      Pelajari misi dan dampak yang kami perjuangkan
    </a>
  </div>
</section>

<!-- CountUp.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.6.2/countUp.umd.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    let animated = false; // Supaya tidak jalan berkali-kali

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !animated) {
          animated = true;

          // Rupiah
          const money = new countUp.CountUp('count-money', 30000000, {
            prefix: 'Rp ',
            separator: '.'
          });
          money.start();

          // CO2
          const co2 = new countUp.CountUp('count-co2', 1129000, {
            separator: '.',
            suffix: ' kg'
          });
          co2.start();

          // Waste
          const waste = new countUp.CountUp('count-waste', 1129000, {
            separator: '.',
            suffix: ' kg'
          });
          waste.start();

          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.3 // hero terlihat minimal 30%
    });

    observer.observe(document.querySelector("#hero-impact"));
  });
</script>
