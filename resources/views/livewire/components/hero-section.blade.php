<section style="background-color: #fffaf7;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h1 class="text-2xl lg:text-6xl leading-tight" style="font-weight: 900; color: #433592;">
                        <span style="color: #433592; font-weight: 900;">Kalau bisa 
                            <span style="color: #433592; font-weight: 800;" class="py-1 rounded inline-block min-w-[80px] lg:min-w-[140px] text-center" 
                                  id="animated-text" 
                                  style="animation: 3s ease 0s infinite normal forwards running fadeInOut; color: #433592; font-weight: 900;">pinjam</span>
                        </span><br>
                        <span style="color: #433592; font-weight: 900;">kenapa harus beli?</span><br>
                    </h1>
                    
                    <p class="text-sm lg:text-xl text-gray-600 max-w-md">
                        Daripada hanya dipakai sekali, mending pinjam barang yang kamu perlukan dengan harga miring. Dompetmu tenang, lingkungan pun aman.
                    </p>
                </div>
                
                <div>
                    <a href="{{ route('register.custom') }}" class="inline-block text-white px-6 py-3 lg:px-8 lg:py-4 rounded-lg font-semibold text-base lg:text-lg transition-colors" 
                       style="background-color: #433592;" 
                       onmouseover="this.style.backgroundColor='#3A2B7A'" 
                       onmouseout="this.style.backgroundColor='#433592'">
                        Bergabung untuk memulai
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="space-y-4">
                    <img src="{{ asset('images/naikGunung.png') }}" 
                         alt="Camera equipment" 
                         class="rounded-lg w-full h-32 object-cover">
                    <img src="{{ asset('images/buku.jpg') }}" 
                         alt="Projector rental" 
                         class="rounded-lg w-full h-40 object-cover">
                </div>

                <div class="space-y-4 mt-8">
                    <img src="{{ asset('images/MainPS.jpg') }}" 
                         alt="Gaming console" 
                         class="rounded-lg w-full h-40 object-cover">
                    <img src="{{ asset('images/proyektor.jpeg') }}" 
                         alt="Photography equipment" 
                         class="rounded-lg w-full h-32 object-cover">
                </div>

                <div class="space-y-4 hidden lg:block">
                    <img src="{{ asset('images/foto.jpeg') }}" 
                         alt="Photography setup" 
                         class="rounded-lg w-full h-32 object-cover">
                    <img src="{{ asset('images/badminton.jpg') }}" 
                         alt="Camera rental" 
                         class="rounded-lg w-full h-40 object-cover">
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const animatedText = document.getElementById('animated-text');
        if (animatedText) {
            const words = ['pinjam', 'berbagi', 'hemat', 'donasi'];
            let currentIndex = 0;
            
            function changeWord() {
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % words.length;
                    animatedText.textContent = words[currentIndex];
                }, 750); 
            }
            
            setInterval(changeWord, 3000);
        }
    });
    </script>

    <style>
    @keyframes fadeInOut {
        0% { opacity: 1; transform: translateY(0); }
        25% { opacity: 0; transform: translateY(-5px); }
        50% { opacity: 0; transform: translateY(-5px); }
        75% { opacity: 1; transform: translateY(0); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    #animated-text {
        animation: fadeInOut 3s ease infinite;
        font-weight: 900 !important;
        font-family: 'Google Sans', 'Product Sans', sans-serif !important;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Google Sans', 'Product Sans', sans-serif !important;
    }
    </style>
</section>
