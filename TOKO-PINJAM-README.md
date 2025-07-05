# Toko Pinjam - Library of Things

Toko Pinjam adalah platform berbagi ekonomi yang memungkinkan pengguna untuk meminjam berbagai peralatan rumah tangga, alat pertukangan, dan peralatan lainnya dengan sistem donasi. Platform ini dibangun menggunakan Laravel 12, Livewire 3, dan TailwindCSS.

## 🚀 Fitur Utama

### Untuk Pengguna (Guest & Member)

-   **Landing Page yang Responsif**: Mudah dipahami dan diakses oleh user
-   **Filter Lokasi**: Pengguna dapat memfilter barang berdasarkan lokasi (Indonesia, Purwokerto, Jakarta, dll.)
-   **Katalog Barang**: Menampilkan berbagai kategori barang yang tersedia untuk dipinjam
-   **Testimonials Bergulir**: Section testimonial dengan animasi horizontal scroll
-   **Sistem Registrasi**: Pengguna dapat mendaftar sebagai member untuk melakukan peminjaman

### Untuk Admin

-   **Dashboard Admin**: Kelola data barang, booking, dan member
-   **Manajemen Inventory**: Update stok dan ketersediaan barang
-   **Laporan Peminjaman**: Monitor semua aktivitas peminjaman

### Sistem Booking

-   **Booking Online**: Member dapat melakukan booking barang
-   **Sistem Donasi**: Harga berdasarkan donasi per hari
-   **Update Stok Otomatis**: Stok berkurang otomatis saat booking dikonfirmasi
-   **Status Tracking**: Pending → Confirmed → Active → Completed

## 🛠️ Teknologi yang Digunakan

-   **Backend**: Laravel 12
-   **Frontend**: Livewire 3 + TailwindCSS
-   **Database**: SQLite (development)
-   **Authentication**: Laravel Breeze dengan Livewire

## 📊 Database Schema

### Users

-   Role-based (admin/user)
-   Profile lengkap dengan phone, address, avatar

### Items

-   Kategori dan lokasi
-   Sistem stok dan available_stock
-   Harga donasi per hari
-   Multiple images support

### Bookings

-   Kode booking unik
-   Tanggal mulai dan selesai
-   Total donasi
-   Status tracking lengkap

### Categories

-   8 kategori utama: Tools & Home, Accounting, Cleaning, DIY, Cooking & Heating, Gardening, Tech & Fitness, Holiday

### Locations

-   5 lokasi: Jakarta, Purwokerto, Bandung, Surabaya, Yogyakarta
-   Koordinat GPS untuk setiap lokasi

### Testimonials

-   Rating system
-   Featured testimonials untuk landing page

## 🚀 Instalasi

1. **Clone Repository**

    ```bash
    git clone <repository-url>
    cd toko-pinjam-v1
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Setup**

    ```bash
    php artisan migrate:fresh --seed
    ```

5. **Build Assets**

    ```bash
    npm run build
    ```

6. **Run Server**
    ```bash
    php artisan serve
    ```

## 👤 Default Accounts

### Admin Account

-   **Email**: admin@tokopinjam.com
-   **Password**: password

### Test User Accounts

-   **Email**: john@example.com / jane@example.com
-   **Password**: password

## 🎨 Komponen Livewire

### Landing Page Components

-   `Navbar`: Navigation dengan authentication state
-   `HeroSection`: Hero section dengan call-to-action
-   `HowItWorks`: 3 step process explanation
-   `LocationFilter`: Dropdown filter lokasi dengan reactive updates
-   `ItemsSection`: Display featured items dan grid barang
-   `TestimonialsSection`: Horizontal scrolling testimonials
-   `Footer`: Footer dengan links dan info

### Features

-   **Reactive Location Filtering**: Filter barang berdasarkan lokasi secara real-time
-   **Mobile Responsive**: Tampilan optimal di semua device
-   **Smooth Animations**: Testimonials bergulir horizontal otomatis
-   **Modern UI**: Mengikuti design system yang konsisten

## 📱 Responsive Design

Website ini fully responsive dengan breakpoints:

-   **Mobile**: < 768px
-   **Tablet**: 768px - 1024px
-   **Desktop**: > 1024px

## 🎯 Roadmap

### Phase 1 (Current)

-   ✅ Landing page sesuai desain
-   ✅ Database schema lengkap
-   ✅ Authentication system
-   ✅ Basic CRUD operations

### Phase 2 (Next)

-   [ ] Booking system frontend
-   [ ] Payment integration
-   [ ] Admin dashboard
-   [ ] Email notifications

### Phase 3 (Future)

-   [ ] Mobile app
-   [ ] Advanced search & filters
-   [ ] User reviews & ratings
-   [ ] Inventory management

## 🤝 Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 📞 Support

Untuk pertanyaan atau dukungan, silakan hubungi tim development atau buat issue di repository ini.

---

**Toko Pinjam** - Sharing Economy Platform untuk Indonesia 🇮🇩
