<div>
    <!-- Navbar -->
    <livewire:components.navbar />

    <!-- Main Content -->
    <section class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 leading-relaxed"
             style="color:#413291; text-align:justify;">

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl font-extrabold"
                style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                Peraturan Meminjam di Toko Pinjam
            </h1>

            <p>
                Sebelum kamu meminjam, pastikan kamu telah membaca dan setuju dengan berbagai peraturan di Toko Pinjam.
            </p>
            <p>
                Halaman ini berisi tentang hukum yang mengikat antara kamu dan Toko Pinjam. Baca dengan hati-hati.
            </p>
            <p>
                Jika kamu merasa ada penjelasan yang kurang jelas, 
                <a href="{{ route('kontak') }}" class="underline font-semibold hover:opacity-80">hubungi kami</a> untuk bertanya.
            </p>
            <p>
                Dengan meminjam di Toko Pinjam, kamu mengonfirmasi bahwa telah membaca dan mengerti dengan peraturan-peraturan berikut yang mengikat:
            </p>

            <!-- Definisi -->
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold mt-10 mb-4"
                    style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                    Definisi
                </h2>

                {{-- gunakan list-inside agar tidak melebar keluar heading --}}
                <ul class="list-disc list-inside space-y-2 md:pl-0">
                    <li><strong>‘Meminjam’</strong> – perilaku mengambil dan menggunakan barang milik Toko Pinjam setelah membayar donasi minimal dan mengembalikan barang dalam kurun waktu yang ditentukan.</li>
                    <li><strong>‘Donasi minimal’</strong> – nominal uang dalam rupiah yang ditentukan oleh Toko Pinjam yang perlu diberikan untuk dapat meminjam suatu barang. Nominal untuk setiap barang berbeda-beda.</li>
                    <li><strong>‘Biaya telat’</strong> – sebesar 1.5x dari donasi minimal setiap barang untuk setiap satu hari telat.</li>
                    <li><strong>‘Toko Pinjam’</strong> – nonprofit organization yang meminjamkan barang-barang kepada anggotanya.</li>
                    <li><strong>‘Anggota’</strong> – individu yang telah mendaftarkan diri ke Toko Pinjam dengan mengisi setiap informasi dalam formulir registrasi, entah sudah pernah meminjam ataupun belum.</li>
                </ul>
            </div>

            <!-- Registrasi dan Keanggotaan -->
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold mt-10 mb-4"
                    style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                    Registrasi dan Keanggotaan
                </h2>

                <p>Hanya Anggota yang boleh meminjam di Toko Pinjam.</p>
                <p>Untuk menjadi Anggota, kamu harus:</p>

                {{-- bernomor & menjorok ke dalam --}}
                <ol class="list-decimal list-outside pl-6 md:pl-8 space-y-2 mt-2">
                    <li>Seorang mahasiswa (D3/D4/S1/S2/S3) di jurusan dan universitas apa pun.</li>
                    <li>Memberikan informasi pribadi: Nama lengkap, Kartu Tanda Mahasiswa (KTM), Nomor telepon, dan alamat email. Serta beberapa informasi pendukung yang tertera dalam form registrasi.</li>
                    <li>Memverifikasi bersama tim Toko Pinjam informasi yang telah kamu berikan dengan Kartu Tanda Penduduk (KTP).</li>
                    <li>Mencentang box kosong bahwa kamu sudah membaca, mengerti dan terikat dengan peraturan Toko Pinjam.</li>
                </ol>
            </div>

            <!-- Peminjaman -->
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold mt-10 mb-4"
                    style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                    Peminjaman
                </h2>

                <p><strong>Tanggung jawab Anggota</strong></p>
                <p>
                    Peraturan ini akan melindungi barang pinjaman dan Anggota yang meminjam. Toko Pinjam adalah sebuah nonprofit organization yang mempromosikan gaya hidup pinjam meminjam yang lebih murah, praktis, dan ramah lingkungan. Maka dari itu, setiap Anggota wajib mengembalikan barang yang dipinjam dalam keadaan bersih, utuh, dan tepat waktu.
                </p>
                <p>Sebagai Anggota, kamu bertanggung jawab untuk:</p>

                <ol class="list-decimal list-outside pl-6 md:pl-8 space-y-4 mt-2">
                    <li>
                        <strong>Mengembalikan barang secara utuh dan bersih.</strong> Jika barang dikembalikan ke Toko Pinjam dalam keadaan yang tidak sesuai dan tidak dapat diterima oleh Toko Pinjam, maka Toko Pinjam berhak untuk menolak uang donasi yang sebelumnya diberikan oleh Toko Pinjam sebagai ganti rugi atas ketidaksesuaian kondisi. Jika Anggota mengembalikan barang dalam kondisi tidak layak, tim kami akan memberi tahu Toko Pinjam ketika pengembalian dilakukan. Maka dari itu, Anggota dapat dikenai denda jika Toko Pinjam menemukan kondisi yang tidak sesuai.
                    </li>
                    <li>
                        <strong>Mengembalikan barang tepat waktu.</strong> Anggota wajib mengembalikan barang ke Toko Pinjam di alamat Toko Pinjam di setiap daerah secara tepat waktu. Jika ada halangan sehingga tidak bisa mengembalikan tepat waktu, Anggota wajib memberi tahu tim Toko Pinjam minimal 24 jam sebelum tanggal pengembalian melalui pesan WhatsApp atau email yang telah diinformasikan. Anggota juga harus mengunggah bukti pengembalian di formulir yang telah diberikan. Jika tidak, Anggota dapat dikenai denda biaya keterlambatan.
                    </li>
                </ol>

                <p class="mt-6 font-semibold" style="color:#E11D48;">
                    PENTING: Apabila Anggota tidak mengembalikan barang selama 24 jam setelah jadwal pengembalian dan tidak menghubungi tim kami, maka barang dianggap <u>“tidak kembali”</u> dan kamu akan dikenai biaya penggantian barang sesuai nilai pasar barang tersebut.
                </p>

                <p class="mt-4">
                    Kami akan mencatat semua pengembalian serta mengirimkan e-receipt kepada Anggota melalui pesan WhatsApp dan email untuk semua denda yang dikenai.
                </p>

                <p class="mt-2">
                    Barang-barang tetap selalu menjadi properti milik Toko Pinjam, dan pencurian barang-barang akan ditangani sesuai peraturan kriminal.
                </p>
            </div>

            <!-- Lanjutan Peminjaman -->
            <div class="space-y-6 mt-10">
                <p><strong>Mengembalikan kembali barang lengkap dengan setiap bagian-bagiannya.</strong> Anggota mengerti bahwa jika Anggota tidak melapor kepada Toko Pinjam terkait bagian yang tidak lengkap atau hilang dari sebuah barang yang dipinjam, maka Anggota akan dikenai denda untuk penggantian atau perbaikan setiap bagian yang tidak lengkap atau hilang.</p>

                <p><strong>Melaporkan setiap kerusakan segera mungkin melalui <a href="{{ route('kontak') }}" class="underline font-semibold hover:opacity-80">WhatsApp Toko Pinjam</a>.</strong> Kami tidak akan mengenakan denda kepada Anggota jika kerusakan terjadi dikarenakan alasan yang wajar dalam penggunaan barang dan dilaporkan secara jujur dan segera.</p>

                <p>Namun, jika barang yang dipinjam rusak karena alasan yang tidak wajar, Toko Pinjam akan mengenai Anggota denda untuk biaya perbaikan atau penggantian barang.</p>

                <p>Anggota mengerti bahwa Toko Pinjam tidak bertanggung jawab atas cacat produk yang disebabkan ketika pembuatan barang (manufacturing barang).</p>

                <p><strong>Anggota mengerti bahwa setiap peminjaman yang telah diajukan tidak dapat dibatalkan.</strong></p>

                <p><strong>Menjaga barang agar tetap aman.</strong> Barang yang Anggota pinjam, adalah tanggung jawab Anggota sejak pertama diserahkan dari Toko Pinjam hingga pengembalian kembali ke Toko Pinjam. Jika Anggota meminjamkan barang atau barang yang dipinjam dengan orang di luar Anggota ketika masa peminjaman, Toko Pinjam akan mengenai Anggota denda dengan nominal sebesar harga beli benda sebagai ganti rugi.</p>

                <p><strong>Memeriksa penampakan visual dan kelengkapan benda sebelum digunakan.</strong> Adalah tanggung jawab Anggota untuk melaporkan setiap kerusakan atau bagian benda yang hilang pada saat pengambilan barang. Jika tidak, Anggota akan dikenai denda perbaikan atau penggantian. Contoh: periksa bahwa semua bagian barang utuh, periksa keadaan kabin dan calakan tercapar keretakan yang terlihat secara fisik sebelum digunakan, dan jangan gunakan barang diluar atau dekat api jika tidak untuk digunakan untuk keperluan tersebut.</p>

                <p><strong>Tidak meminjam barang untuk keperluan yang intensif dan keperluan profesional yang berat.</strong> Jika ini terjadi, maka keanggotaan akan dibatalkan.</p>

                <p>
                    Kami mengizinkan barang kamu digunakan untuk aktivitas yang dibayar asalkan aktivitas tersebut tidak intensif, terus menerus berlarut, atau kelas berat; contoh-contoh aktivitas yang diperbolehkan termasuk namun tidak terbatas untuk pesat komunitas atau grup komunitas, manjual rekerimemmu him baranag yang mengayankan Proyektor atau bina kezi yang hadir dalam sebuah bazar menggunakan tenda Gazebo milik kami. Jika kamu memiliki keraguan tentang penggunaan yang diizinkan atau tidak diizinkan dengan barang pinjaman untuk aktivitas yang dibayar, tanyakan kepada Toko Pinjam melalui WhatsApp atau email.
                </p>

                <p class="font-semibold" style="color:#E11D48;">
                    TOLONG BERIKAN PERHATIAN LEBIH UNTUK MEMBACA DAN MENGERTI KALIMAT YANG DITULIS DENGAN HURUF KAPITAL, GARIS BAWAH, DAN FONT TEBAL BERIKUT YANG SANGAT PENTING: SEBAGAI ANGGOTA, KAMU SEPAKAT UNTUK MEMBEBASKAN, DAN TIDAK MENUNTUT TOKO PINJAM, BESERTA PEJABAT, AGEN, DAN KARYAWANNYA DARI SEGALA TANGGUNG JAWAB, KERUGIAN, KLAIM, TUNTUTAN, ATAU PENYEBAB TINDAKAN HUKUM ATAS KEMATIAN ATAU CEDERA PADA SIAPAPUN DAN KERUSAKAN PROPERTI YANG DIALAMI ATAU DIDERITA OLEH SIAPAPUN, YANG TIMBUL DARI PENGGUNAAN BARANG YANG ANDA PINJAM.
                </p>

                <p>
                    Jika kami menganggap bahwa kamu tidak menghargai peraturan dan tanggung jawab sebagai Anggota Toko Pinjam, maka kami berhak membatalkan keanggotaan Anggota kapanpun.
                </p>

                <p>Anggota mengerti bahwa <strong>legal action</strong> dapat ditempuh jika Anggota tidak mematuhi semua peraturan yang tertulis di halaman ini.</p>
            </div>

            <!-- Tanggung Jawab Toko Pinjam -->
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold mt-12 mb-4"
                    style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                    Tanggung Jawab Toko Pinjam
                </h2>

                <ol class="list-decimal list-outside pl-6 md:pl-8 space-y-2">
                    <li>Mengurus setiap permasalahan dan komplain terkait dengan peminjaman, termasuk menyediakan pengembalian dana kepada Anggota jika untuk alasan tertentu Anggota membayar lebih tinggi dari harga pinjam barang yang dipinjam. Pengembalian sampai kembali ke Anggota dalam kurun waktu 10 hari sejak penerimaan kasus.</li>
                    <li>Menyimpan semua data Anggota dengan aman.</li>
                    <li>Toko Pinjam diperbolehkan untuk menolak pengajuan peminjaman jika Anggota sebelumnya telah melanggar ketentuan dan peraturan Toko Pinjam dan jika Toko Pinjam memiliki alasan untuk mencurigai Anggota akan melakukan hal serupa.</li>
                </ol>
            </div>

            <!-- Komunikasi dengan Anggota -->
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold mt-12 mb-4"
                    style="color:#413291; font-family:'Google Sans','Product Sans',sans-serif;">
                    Komunikasi dengan Anggota
                </h2>

                <p>Sebagai Anggota Toko Pinjam, kamu akan menerima pesan melalui beberapa saluran komunikasi dari kami, termasuk:</p>

                <ol class="list-decimal list-outside pl-6 md:pl-8 space-y-2 mt-2">
                    <li>Konfirmasi peminjaman dan pengembalian setiap kali kamu meminjam.</li>
                    <li>Email selamat datang yang berisi informasi bagaimana cara meminjam.</li>
                    <li>Email rutin setiap ada pembaruan terkait layanan kami.</li>
                </ol>

                <p class="mt-2">
                    Jika kamu bukan lagi Anggota Toko Pinjam, beri tahu kami melalui 
                    <a href="{{ route('kontak') }}" class="underline font-semibold hover:opacity-80">WhatsApp atau email</a>. 
                    Kami akan menghapus seluruh data pribadi kamu dalam kurun waktu 5 hari.
                </p>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <livewire:components.footer />
</div>
