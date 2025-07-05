<section style="background-color: #fffaf7;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left content -->
            <div class="space-y-8">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl leading-tight" style="font-weight: 900; color: #433592;">
                        <span style="color: #433592; font-weight: 900;">Kalau bisa 
                            <span style="color: #433592; font-weight: 800;" class="py-1 rounded inline-block min-w-[120px] lg:min-w-[140px] text-center" 
                                  id="animated-text" 
                                  style="animation: 3s ease 0s infinite normal forwards running fadeInOut; color: #433592; font-weight: 900;">pinjam</span>
                        </span><br>
                        <span style="color: #433592; font-weight: 900;">kenapa harus beli?</span><br>
                    </h1>
                    
                    <p class="text-xl text-gray-600 max-w-md">
                        Rent useful household items from your local high street. Learn DIY & repair skills to complete projects yourself.
                    </p>
                </div>
                
                <div>
                    <a href="#" class="inline-block text-white px-8 py-4 rounded-lg font-semibold text-lg transition-colors" 
                       style="background-color: #433592;" 
                       onmouseover="this.style.backgroundColor='#3A2B7A'" 
                       onmouseout="this.style.backgroundColor='#433592'">
                        Join to get started
                    </a>
                </div>
            </div>

            <!-- Right content - Image grid -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Row 1 -->
                <div class="space-y-4">
                    <img src="{{ asset('images/kamera.jpeg') }}" 
                         alt="Camera equipment" 
                         class="rounded-lg w-full h-32 object-cover">
                    <img src="{{ asset('images/proyektor.jpeg') }}" 
                         alt="Projector rental" 
                         class="rounded-lg w-full h-40 object-cover">
                </div>
                
                <!-- Row 2 -->
                <div class="space-y-4 mt-8">
                    <img src="{{ asset('images/MainPS.jpg') }}" 
                         alt="Gaming console" 
                         class="rounded-lg w-full h-40 object-cover">
                    <img src="{{ asset('images/foto.jpeg') }}" 
                         alt="Photography equipment" 
                         class="rounded-lg w-full h-32 object-cover">
                </div>
                
                <!-- Row 3 -->
                <div class="space-y-4 hidden lg:block">
                    <img src="{{ asset('images/foto.jpeg') }}" 
                         alt="Photography setup" 
                         class="rounded-lg w-full h-32 object-cover">
                    <img src="{{ asset('images/kamera.jpeg') }}" 
                         alt="Camera rental" 
                         class="rounded-lg w-full h-40 object-cover">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script untuk animasi teks -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const animatedText = document.getElementById('animated-text');
        if (animatedText) {
            const words = ['pinjam', 'berbagi', 'berhemat', 'berdonasi'];
            let currentIndex = 0;
            
            function changeWord() {
                // Change text during the fade out phase (25%-50% of animation)
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % words.length;
                    animatedText.textContent = words[currentIndex];
                }, 750); // 25% of 3000ms = 750ms
            }
            
            // Change word every 3 seconds to sync with CSS animation
            setInterval(changeWord, 3000);
        }
    });
    </script>
    
    <!-- Style untuk animasi teks -->
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
    
    /* Ensure all headings use the bold font */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Google Sans', 'Product Sans', sans-serif !important;
    }
    </style>
</section>
