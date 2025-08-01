<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Syarat & Ketentuan - {{ config('app.name', 'Toko Pinjam') }}</title>

         <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_io/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/favicon-16x16.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon_io/site.webmanifest') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Product+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Navbar -->
        @livewire('components.navbar')

        <!-- Main Content -->
        <div class="min-h-screen bg-gray-50 py-8 px-4">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-[#433592] mb-2">Peraturan Meminjam di Toko Pinjam</h1>
                        <p class="text-gray-600">Toko Pinjam - Platform Peminjaman Barang Mahasiswa</p>
                    </div>

                    <div class="prose prose-lg max-w-none text-[#433592]">
                        <p class="mb-6">Sebelum kamu meminjam, pastikan kamu telah membaca dan setuju dengan berbagai peraturan di Toko Pinjam.</p>
                        
                        <p class="mb-6">Halaman ini berisi tentang hukum yang mengikat antara kamu dan Toko Pinjam. Baca dengan hati-hati.</p>
                        
                        <p class="mb-6">Jika kamu merasa ada penjelasan yang kurang jelas, hubungi kami untuk bertanya.</p>
                        
                        <p class="mb-8 font-semibold">Dengan meminjam di Toko Pinjam, kamu mengonfirmasi bahwa telah membaca dan mengerti dengan peraturan-peraturan berikut yang mengikat</p>

                        <h2 class="text-2xl font-bold text-[#433592] mb-4">Definisi</h2>
                        <div class="mb-6 space-y-3">
                            <p><strong>'Meminjam'</strong> – perilaku mengambil dan menggunakan barang milik Toko Pinjam setelah membayar donasi minimal dan mengembalikan barang dalam kurun yang ditentukan.</p>
                            <p><strong>'Donasi minimal'</strong> – nominal uang dalam rupiah yang ditentukan oleh Toko Pinjam yang perlu diberikan untuk dapat meminjam suatu barang. Nominal untuk setiap barang berbeda-beda.</p>
                            <p><strong>'Biaya telat'</strong> – sebesar 1.5x dari donasi minimal setiap barang untuk setiap satu hari telat.</p>
                            <p><strong>'Toko Pinjam'</strong> – nonprofit organization yang meminjamkan barang-barang kepada anggotanya.</p>
                            <p><strong>'Anggota'</strong> – individu yang telah mendaftarkan diri ke Toko Pinjam dengan mengisi setiap informasi dalam formulir registrasi, entah sudah pernah meminjam ataupun belum.</p>
                        </div>

                        <h2 class="text-2xl font-bold text-[#433592] mb-4">Registrasi dan Keanggotaan</h2>
                        <p class="mb-4">Hanya Anggota yang boleh meminjam di Toko Pinjam.</p>
                        <p class="mb-4">Untuk menjadi anggota, kamu harus:</p>
                        <ol class="list-decimal pl-6 mb-6 space-y-2">
                            <li>Seorang mahasiswa (D3/D4/S1/S2/S3) di jurusan dan universitas apapun</li>
                            <li>Memberikan informasi pribadi: Nama lengkap, Kartu Tanda Mahasiswa (KTM), Nomor telepon, dan alamat email. Serta beberapa informasi pendukung yang tertera dalam form registrasi.</li>
                            <li>Memverifikasi bersama tim Toko Pinjam informasi yang telah kamu berikan dengan Kartu Tanda Penduduk (KTP)</li>
                            <li>Mencentang box kosong bahwa kamu sudah membaca, mengerti dan terikat dengan peraturan Toko Pinjam</li>
                        </ol>

                        <h2 class="text-2xl font-bold text-[#433592] mb-4">Peminjaman</h2>
                        <h3 class="text-xl font-semibold text-[#433592] mb-3">Tanggung jawab Anggota</h3>
                        <p class="mb-4">Peraturan ini akan melindungi barang pinjaman dan Anggota yang meminjam. Toko Pinjam adalah sebuah nonprofit organization yang mempromosikan gaya hidup pinjam meminjam yang lebih murah, praktis, dan ramah lingkungan. Maka dari itu, setiap Anggota wajib mengembalikan barang yang dipinjam dalam keadaan bersih, utuh, dan tepat waktu.</p>
                        
                        <p class="mb-4">Sebagai Anggota, kamu bertanggung jawab untuk:</p>
                        <ol class="list-decimal pl-6 mb-6 space-y-4">
                            <li><strong>Mengembalikan barang secara utuh dan bersih.</strong> Jika barang dikembalikan ke Toko Pinjam dalam keadaan yang tidak sesuai dan tidak dapat diterima oleh Toko Pinjam, maka Toko Pinjam berhak untuk menagih uang denda yang jumlahnya ditentukan oleh Toko Pinjam sebagai ganti rugi atas ketidaksesuaian kondisi. Jika Anggota mengembalikan barang dalam keadaan yang tidak sesuai tanpa memberi tahu Toko Pinjam ketika pengembalian, maka Anggota dapat dikenai denda jika Toko Pinjam menemukan kondisi yang tidak sesuai.</li>
                            <li><strong>Mengembalikan barang tepat waktu.</strong> Anggota wajib mengembalikan barang yang dipinjam ke alamat Toko Pinjam di setiap daerah secara tepat waktu. Jika ada halangan sehingga tidak bisa mengembalikan tepat waktu, maka Anggota wajib menghubungi dan memberi tahu admin Toko Pinjam melalui <strong>Kontak</strong> Toko Pinjam untuk mengatur kembali jadwal pengembalian. Anggota tahu bahwa mengembalikan barang tidak tepat waktu maka akan dikenakan denda sebesar 1.5 kali harga sewa barang yang dipinjam.</li>
                        </ol>

                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <p class="font-bold text-red-800 underline">PENTING:</p>
                            <p class="text-red-700"><strong>Apabila Anggota tidak mengembalikan barang selama 24 jam setelah jadwal pengembalian tanpa memberikan pemberitahuan kepada Toko Pinjam sebelumnya, maka barang akan dianggap 'tidak kembali' dan kamu akan dikenai biaya penggantian barang tersebut dengan nominal sebesar harga barang tersebut.</strong></p>
                        </div>

                        <p class="mb-4">Kami akan memberi tahu serta mengirimkan e-receipt kepada Anggota melalui pesan WhatsApp dan email untuk semua denda yang dikenai.</p>
                        
                        <p class="mb-4">Barang-barang tetap selalu menjadi properti milik Toko Pinjam, dan pencurian barang-barang atau bagian dari barang-barang adalah perbuatan kriminal.</p>

                        <div class="mb-6 space-y-4">
                            <p><strong>Mengembalikan kembali barang lengkap dengan setiap bagian-bagiannya.</strong> Anggota mengerti bahwa jika Anggota tidak melapor kepada Toko Pinjam terkait bagian yang tidak lengkap atau hilang dari sebuah barang yang dipinjam, maka Anggota akan dikenai denda untuk penggantian atau perbaikan setiap bagian yang tidak lengkap atau hilang.</p>
                            
                            <p><strong>Melaporkan setiap kerusakan sesegera mungkin melalui WhatsApp Toko Pinjam.</strong> Kami tidak akan mengenakan denda kepada Anggota jika kerusakan terjadi dikarenakan alasan yang wajar dalam penggunaan barang dan dilaporkan secara jujur dan segera.</p>
                            
                            <p>Akan tetapi, jika barang yang dipinjam rusak karena alasan yang tidak wajar, Toko Pinjam akan mengenai Anggota denda untuk biaya perbaikan atau penggantian barang.</p>
                            
                            <p>Anggota mengerti bahwa Toko Pinjam tidak bertanggung jawab atas cacat produk yang disebabkan ketika pembuatan barang (manufaktur barang).</p>
                            
                            <p><strong>Anggota mengerti bahwa setiap peminjaman yang telah diajukan tidak dapat dibatalkan.</strong></p>
                            
                            <p><strong>Menjaga barang agar tetap aman.</strong> Barang yang Anggota pinjam, adalah tanggung jawab Anggota sejak pertama diserahkan dari Toko Pinjam hingga pengembalian kembali ke Toko Pinjam. Jika Anggota menghilangkan barang atau barang dicuri dari Anggota ketika masa peminjaman, Toko Pinjam akan mengenai Anggota denda dengan nominal sebesar harga beli benda sebagai ganti rugi.</p>
                            
                            <p><strong>Memeriksa penampakan visual dan kelengkapan benda sebelum digunakan.</strong> Adalah tanggung jawab Anggota untuk melaporkan setiap kerusakan atau bagian benda yang hilang pada saat pengembalian barang. Jika tidak, Anggota akan dikenai denda perbaikan atau penggantian. Contoh, periksa bahwa semua bagian barang utuh, periksa apakah kabel dan colokan terdapat kerusakan yang terlihat secara fisik sebelum digunakan, dan jangan gunakan barang diluar atau dekat air jika tidak untuk digunakan untuk keperluan tersebut.</p>
                            
                            <p><strong>Tidak meminjam barang untuk keperluan yang intensif dan keperluan profesional yang berat.</strong> Jika ini terjadi, maka keanggotaan akan dibatalkan.</p>
                        </div>

                        <p class="mb-6">Kami mengizinkan barang kami digunakan untuk aktivitas yang dibayar asalkan aktivitas tersebut tidak intensif, terus menerus berlanjut, atau kelas berat: contoh-contoh aktivitas yang diperbolehkan termasuk (namun tidak terbatas untuk) seorang musisi atau grup komunitas menjual tiket menonton film bersama yang menggunakan Proyektor atau bisnis kecil yang hadir dalam sebuah bazar menggunakan Tenda Gazebo milik kami. Jika kamu memiliki keraguan tentang penggunaan yang diizinkan atau tidak diizinkan dengan barang pinjaman untuk aktivitas yang dibayar, tanyakan kepada Toko Pinjam melalui WhatsApp atau email.</p>

                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6">
                            <p class="font-regular text-yellow-800 uppercase">TOLONG BERIKAN PERHATIAN LEBIH UNTUK MEMBACA DAN MENGERTI KALIMAT YANG DITULIS DENGAN HURUF KAPITAL, GARIS BAWAH, DAN FONT TEBAL BERIKUT YANG SANGAT PENTING:</p>
                            <p class="text-yellow-700 font-bold underline">SEBAGAI ANGGOTA, KAMU SEPAKAT UNTUK MEMBEBASKAN DAN TIDAK MENUNTUT TOKO PINJAM, BESERTA PEJABAT, AGEN, DAN KARYAWANNYA DARI SEGALA TANGGUNG JAWAB, KERUGIAN, KLAIM, TUNTUTAN, ATAU PENYEBAB TINDAKAN HUKUM ATAS KEMATIAN ATAU CEDERA PADA SIAPAPUN DAN KERUSAKAN PROPERTI YANG DIALAMI ATAU DIDERITA OLEH SIAPAPUN, YANG TIMBUL DARI PENGGUNAAN BARANG YANG ANDA PINJAM.</p>
                        </div>

                        <p class="mb-4">Jika kami menganggap bahwa kamu tidak menghargai peraturan dan tanggung jawab sebagai peminjam ketika meminjam, maka kami berhak membatalkan keanggotaan Anggota kapanpun.</p>
                        
                        <p class="mb-6">Anggota mengerti bahwa legal action dapat ditempuh jika Anggota tidak mematuhi semua peraturan yang tertulis di halaman ini.</p>

                        <h2 class="text-2xl font-bold text-[#433592] mb-4">Tanggung Jawab Toko Pinjam</h2>
                        <ol class="list-decimal pl-6 mb-6 space-y-2">
                            <li>Mengurus setiap permasalahan dan komplain terkait dengan peminjaman, termasuk menyediakan pengembalian dana kepada Anggota jika untuk alasan tertentu Anggota membayar lebih tinggi dari harga pinjam barang yang dipinjam. Pengembalian sampai kembali ke Anggota dalam kurun waktu 10 hari sejak penemuan kasus.</li>
                            <li>Menyimpan semua data Anggota dengan aman.</li>
                            <li>Toko Pinjam diperbolehkan untuk menolak pengajuan peminjaman jika Anggota sebelumnya telah melanggar ketentuan dan peraturan Toko Pinjam dan jika Toko Pinjam memiliki alasan untuk mencurigai Anggota akan melakukan hal serupa.</li>
                        </ol>

                        <h2 class="text-2xl font-bold text-[#433592] mb-4">Komunikasi dengan Anggota</h2>
                        <p class="mb-4">Sebagai Anggota Toko Pinjam, kamu akan menerima pesan melalui beberapa saluran komunikasi dari kami, termasuk:</p>
                        <ol class="list-decimal pl-6 mb-6 space-y-2">
                            <li>Konfirmasi peminjaman dan pengembalian setiap kali kamu meminjam.</li>
                            <li>Email selamat datang yang berisi informasi bagaimana cara meminjam</li>
                            <li>Email rutin setiap ada pembaruan terkait layanan kami</li>
                        </ol>
                        
                        <p class="mb-4">Jika kamu bukan lagi Anggota Toko Pinjam, beri tahu kami melalui WhatsApp atau email. Kami akan menghapus seluruh data pribadi kamu dalam kurun waktu 5 hari.</p>

                        <h2 class="text-2xl font-semibold text-[#433592] mb-4">Kontak</h2>
                        <p class="mb-4">Untuk pertanyaan atau keluhan, hubungi kami melalui:</p>
                        <p class="mb-4">WhatsApp: <a href="https://wa.me/6285128050500" class="text-purple-600 hover:text-purple-700">0851-2805-0500</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @livewire('components.footer')
    </body>
</html>
