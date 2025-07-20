<div>
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Hero Section -->
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Left Content -->
                <div class="flex-1">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Bergabung<br>Dengan<br>the Super Team
                    </h1>
                </div>
                
                <!-- Right Image -->
                <div class="flex-shrink-0 ml-8">
                    <img src="{{ asset('images/bumiGab.png') }}" 
                         alt="Join Super Team" 
                         class="h-auto object-contain" 
                         style="width: 300px;">
                </div>
            </div>
            <p class="text-xl text-[#433592] leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Kabar gembira! Kami selalu membuka kesempatan bagi kamu yang ingin berpartisipasi dalam gerakan kami. Berikut detilnya:
            </p>
        </div>
    </section>

    <!-- Job Positions Section -->
    <section class="pb-10 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-12 text-left" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Posisi yang umumnya dibuka:
            </h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Kiri: Kreatif (kotak besar) -->
                <div class="bg-[#faf0eb] shadow-lg border border-gray-100">
                    <div class="bg-[#413291] text-white px-6 py-3 rounded-t-xl" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        <h3 class="text-xl font-bold">Kreatif</h3>
                    </div>
                    <div class="bg-[#faf0eb] rounded-b-xl p-6">
                        <ul class="list-disc pl-5 space-y-3 text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <li class="text-lg">Video Editor</li>
                            <li class="text-lg">Social Media Specialist</li>
                            <li class="text-lg">Video Talent</li>
                            <li class="text-lg">Graphic Designer</li>
                            <li class="text-lg">Event Planner</li>
                        </ul>
                    </div>
                </div>

                <!-- Kanan: Grid 2 baris -->
                <div class="flex flex-col space-y-6">
                    <!-- Science -->
                    <div class="bg-white shadow-lg border border-gray-100">
                        <div class="bg-[#413291] text-white px-6 py-3 rounded-t-xl" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <h3 class="text-xl font-bold">Science</h3>
                        </div>
                        <div class="bg-[#faf0eb] rounded-b-xl p-6">
                            <ul class="list-disc pl-5 space-y-3 text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                <li class="text-lg">Blog Writer</li>
                                <li class="text-lg">Content Writer</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Technology -->
                    <div class="bg-white shadow-lg border border-gray-100">
                        <div class="bg-[#413291] text-white px-6 py-3 rounded-t-xl" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            <h3 class="text-xl font-bold">Technology</h3>
                        </div>
                        <div class="bg-[#faf0eb] rounded-b-xl p-6">
                            <ul class="list-disc pl-5 space-y-3 text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                <li class="text-lg">Web Developer</li>
                                <li class="text-lg">UI/UX Designer</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Note -->
            <p class="text-[#433592] text-base md:text-lg leading-relaxed mt-12" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Keahlianmu tidak tercantum? Tenang, tetap apply dan beritahu kami apa kontribusi yang bisa kamu sumbangkan! Sertakan juga portofolio jika diperlukan
            </p>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                
                <!-- Persyaratan Umum -->
                <div>
                    <h3 class="text-3xl font-bold text-[#433592] mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Persyaratan umum
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="text-lg font-bold text-[#433592] mt-0">1</div>
                            <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Seorang mahasiswa, S1 diutamakan.
                            </p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="text-lg font-bold text-[#433592] mt-0">2</div>
                            <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Tidak perlu memiliki pengalaman sebelumnya. Justru disini kamu akan dapat pengalaman baru.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Dokumen yang Perlu Disiapkan -->
                <div>
                    <h3 class="text-3xl font-bold text-[#433592] mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Dokumen yang perlu disiapkan
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="text-lg font-bold text-[#433592] mt-0">1</div>
                            <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Curriculum Vitae (CV)
                            </p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="text-lg font-bold text-[#433592] mt-0">2</div>
                            <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Cover Letter, yang menjelaskan kenapa kamu ingin berkontribusi dalam gerakan ini.
                            </p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="text-lg font-bold text-[#433592] mt-0">3</div>
                            <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Portofolio, jika ada dan dirasa perlu (akan jadi nilai plus).
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- Application Process Section -->
    <section class="py-10 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-8 text-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Cara <em>apply</em> :
            </h2>
            
            <div class="bg-[#FDF2EB] rounded-lg p-8 shadow-lg mb-8">
                <ol class="space-y-6 text-gray-700">
                    <li class="flex items-start">
                        <div class="text-lg font-bold text-[#433592] mr-2">1</div>
                        <div>
                            <span class="text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Kirim email ke 
                                <a href="mailto:tokopinjamindonesia@gmail.com" class="text-[#433592] font-bold hover:underline">
                                    tokopinjamindonesia@gmail.com
                                </a> 
                                dengan subjek <strong>"Karir - Nama Lengkap - Posisi"</strong>
                            </span>
                            <p class="text-sm text-gray-600 mt-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                Contoh: Karir - Bruno Fernandes - Video Editor
                            </p>
                        </div>
                    </li>
                    
                    <li class="flex items-start">
                        <div class="text-lg font-bold text-[#433592] mr-2">2</div>
                        <span class="text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Pastikan semua dokumen <em>attached</em> di dalam email.
                        </span>
                    </li>
                    
                    <li class="flex items-start">
                        <div class="text-lg font-bold text-[#433592] mr-2">3</div>
                        <span class="text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Kami akan berikan kabar ke kamu paling lambat dalam 7 hari. Kami janji tidak akan <em>ghosting</em> kamu!
                        </span>
                    </li>
                </ol>
            </div>
            
            <!-- Call to Action Button -->
            <div class="text-center">
                <a href="mailto:tokopinjamindonesia@gmail.com?subject=Karir - [Nama Lengkap] - [Posisi]&body=Halo Tim Toko Pinjam,%0D%0A%0D%0ASaya tertarik untuk bergabung dengan the Super Team sebagai [Posisi yang diinginkan].%0D%0A%0D%0ATerlampir dokumen-dokumen yang diperlukan:%0D%0A- CV%0D%0A- Cover Letter%0D%0A- Portofolio (jika ada)%0D%0A%0D%0ATerima kasih atas kesempatannya.%0D%0A%0D%0ASalam,%0D%0A[Nama Lengkap]" 
                   class="inline-block bg-[#FFC131] text-[#433592] font-bold px-8 py-4 rounded-lg text-lg hover:bg-yellow-300 transition-all duration-300 shadow-lg" 
                   style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Saya mau gabung
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <livewire:components.footer />
</div>
