<div>
    @section('title', 'Super Team')
    
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Hero Section - Gagasan Kami Menembus Ruang Kelas -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Gagasan Kami Menembus<br>Ruang Kelas
            </h1>
            <p class="text-lg text-gray-700 leading-relaxed max-w-3xl mx-auto" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Seluruh anggota tim kami adalah mahasiswa dengan keahlian di bidang masing-masing. Gagasan kami tumbuh di dalam kelas dan termanifestasi di bawah terik matahari. Kami bekerja bersama lintas benua dan zona waktu untuk mempersembahkan karya kami, Toko Pinjam.
            </p>
        </div>
    </section>

    <!-- Meet the Super Team Section -->
    <section class="py-16 bg-[#9be1eb]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-[#433592] mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Meet the Super Team
                </h2>
            </div>
            
            <!-- Team Members -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Rafif N T Bagaskara -->
                <div class="text-center">
                    <div class="relative mb-4">
                        <img src="{{ asset('images/team/bagas.png') }}" 
                             alt="Rafif N T Bagaskara" 
                             class="w-42 h-42 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h3 class="text-xl font-bold text-[#433592] mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Rafif N T Bagaskara
                    </h3>
                    <p class="text-[#433592] font-semibold mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Founder and Director
                    </p>
                    <p class="text-sm text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Environmental Science,<br>
                        University of Toronto
                    </p>
                </div>

                <!-- M Nugrahhadi -->
                <div class="text-center">
                    <div class="relative mb-4">
                        <img src="{{ asset('images/team/hadi.png') }}" 
                             alt="M Nugrahhadi" 
                             class="w-42 h-42 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h3 class="text-xl font-bold text-[#433592] mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        M Nugrahhadi Al K
                    </h3>
                    <p class="text-[#433592] font-semibold mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Operating Director
                    </p>
                    <p class="text-sm text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Teknik Informatika,<br>
                        Universitas Jenderal Soedirman
                    </p>
                </div>

                <!-- Arga -->
                <div class="text-center">
                    <div class="relative mb-4">
                        <img src="{{ asset('images/team/Arga.png') }}" 
                             alt="Arga" 
                             class="w-42 h-42 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h3 class="text-xl font-bold text-[#433592] mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Arga Aryanta I
                    </h3>
                    <p class="text-[#433592] font-semibold mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        IT Specialist
                    </p>
                    <p class="text-sm text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Teknik Informatika,<br>
                        Universitas Jenderal Soedirman
                    </p>
                </div>

                <!-- Allin Alya Yasmin -->
                <div class="text-center">
                    <div class="relative mb-4">
                        <img src="{{ asset('images/team/Alin.png') }}" 
                             alt="Allin Alya Yasmin" 
                             class="w-42 h-42 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h3 class="text-xl font-bold text-[#433592] mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Allin Alya Yasmin
                    </h3>
                    <p class="text-[#433592] font-semibold mb-1" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Sustainability Specialist
                    </p>
                    <p class="text-sm text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Environmental Science,<br>
                        University of Toronto
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-2 sm:px-4 lg:px-6">
            <div class="bg-[#faf0eb] rounded-2xl shadow-xl overflow-hidden">
                <div class="grid lg:grid-cols-2 items-center gap-0">
                    <!-- Left Content -->
                    <div class="pl-8 pr-2 py-4">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-[#433592] mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Ingin Jadi Bagian dari<br>the Super Team?
                        </h2>
                        <p class="text-gray-700 text-base lg:text-lg mb-4 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Kami selalu membuka kesempatan untuk siapapun yang tertarik bergabung bersama the Super Team. Daftarkan dirimu sekarang!
                        </p>
                        <a href="{{ route('bergabung-super-team') }}" class="inline-block bg-[#433592] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#3A2B7A] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Daftar Sekarang
                        </a>
                    </div>
                    <!-- Right Image -->
                    <div class="pl-2 pr-2=4 flex justify-end items-center">
                        <img src="{{ asset('images/team/bangunBumi.png') }}" 
                             alt="Join Super Team" 
                             class="max-w-sm h-auto object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Manfaat Pinjam Section -->
    <livewire:components.manfaat-pinjam />

    

    <!-- Quote Section -->
    <section class="py-16 bg-white relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 z-20">
                    <div class="bg-[#ffc131] text-[#433592] px-8 py-3 rounded-md shadow-lg">
                        <div class="flex items-center gap-2">
                            <h2 class="text-2xl lg:text-4xl font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Apa Yang Kami Percaya
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Main quote box -->
                <div class="bg-[#FDF2EB] rounded-md shadow-xl overflow-hidden relative z-10" style="box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);">
                    <div class="p-12 lg:p-16 flex flex-col justify-center items-center text-center min-h-[300px]">
                        <div class="space-y-6 max-w-4xl">
                            <blockquote class="text-2xl lg:text-3xl text-[#433592] leading-relaxed font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Bumi menyediakan cukup sumber daya untuk memenuhi kebutuhan setiap manusia, tetapi tidak cukup untuk memenuhi keserakahan setiap manusia.
                            </blockquote>
                            
                            <cite class="text-xl lg:text-2xl text-[#433592] font-semibold block" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                - Mahatma Gandhi
                            </cite>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <livewire:components.footer />
</div>
