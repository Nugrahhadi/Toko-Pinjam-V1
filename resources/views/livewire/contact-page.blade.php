<div>
    <livewire:components.navbar />

    <div class="max-w-5xl mx-auto px-6 lg:px-16 py-16">
        {{-- Judul dan Maskot --}}
        <div class="flex flex-col lg:flex-row justify-between items-center mb-10">
            <h2 class="text-5xl font-extrabold text-[#3b0a73] mb-4 lg:mb-10">Kontak</h2>
            <img src="{{ asset('images/aiusage/kontak.png') }}" alt="Maskot" class="w-[130px]">
        </div>

        {{-- Kartu Kontak --}}
        <div class="flex flex-col md:flex-row justify-left gap-4 md:gap-6 mb-10">
            {{-- Email --}}
           <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tokopinjamindonesia@gmail.com&su=Halo%20Admin&body=Halo%20saya%20ingin%20bertanya..."
   target="_blank"
                class="flex-1 bg-red-500 text-white p-6 rounded-xl shadow-md hover:scale-105 transition text-left">
                <div class="text-4xl font-bold flex justify-left items-left gap-2 mb-2">
                   <svg class="w-[50px] h-[50px] fill-[#FFFFFF]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">

  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
  <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"></path>

</svg>
                    Email
                </div>
                <div class="text-2xl md:text-base font-semibold break-words">
                    tokopinjamindonesia@gmail.com
                </div>
            </a>

            {{-- WhatsApp --}}
            <a href="https://wa.me/6285128050500?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang..."
                class="flex-1 bg-lime-300 text-[#3b0a73] p-6 rounded-xl shadow-md hover:scale-105 transition text-left"
                target="_blank">
                <div class="text-4xl font-bold flex justify-left items-left gap-2 mb-2">
                    <span class="[&>svg]:h-12 [&>svg]:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                        </svg>
                    </span>
                    WhatsApp
                </div>
                <div class="text-2xl md:text-base font-semibold">
                    +62 851-2805-0500 (Hanya Chat)

                </div>
            </a>
        </div>

        
    </div>
    {{-- FAQ Section --}}
        <div class="bg-[#FAF0EB] px-10 py-10 rounded-xl text-center mx-auto">
            <p class="text-4xl font-bold text-[#3b0a73]">
                Mau Tanya Apa? Coba Cek FAQ!
            </p>
            <p class="text-xl text-[#3b0a73]">
                Siapa tahu pertanyaanmu sudah terjawab. 
                <a href="#faq" class="text-[#3b0a73] underline hover:text-purple-700">Klik di sini</a>
            </p>
        </div>

    <livewire:components.footer />
</div>
