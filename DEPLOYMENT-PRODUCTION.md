# Panduan Deployment Production - Toko Pinjam V1

## 📋 Langkah-Langkah Upload ke Hosting

### 1. Upload Files ke Hosting
- Upload semua file Laravel ke folder root hosting (bukan ke folder public)
- Struktur folder di hosting harus seperti ini:
```
/ (root hosting)
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess-root
├── index-root.php
├── artisan
├── composer.json
└── composer.lock
```

### 2. Konfigurasi File Hosting

#### A. Ganti nama file untuk production:
```bash
# Di root hosting, rename files:
mv .htaccess-root .htaccess
mv index-root.php index.php
```

#### B. Update file .env di hosting:
```env
APP_NAME="Toko Pinjam"
APP_ENV=production
APP_KEY=base64:CCYNuLtx/4FuxNV+WGXqNNshTYbi8p9XC1rXVygN8Fg=
APP_DEBUG=false
APP_URL=https://tokopinjam.com

# Database production (sesuaikan dengan hosting)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_production_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

### 3. Set Permission Folder
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 755 public/
```

### 4. Run Composer (jika diperlukan)
```bash
composer install --no-dev --optimize-autoloader
```

### 5. Generate Application Key (jika diperlukan)
```bash
php artisan key:generate
```

### 6. Cache Configuration
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Migrate Database
```bash
php artisan migrate --force
```

## 🔧 Penjelasan File Penting

### .htaccess-root
File ini mengatur:
- Force HTTPS untuk keamanan
- Redirect asset files ke folder `/public/`
- Routing Laravel yang benar
- Cache static assets
- Security rules

### index-root.php
File ini:
- Entry point aplikasi di root hosting
- Mengatur path public folder
- Force HTTPS dan URL yang benar
- Load autoloader dan bootstrap Laravel

### AppServiceProvider.php
Sudah dikonfigurasi untuk:
- Deteksi environment production
- Force HTTPS di production
- Asset URL yang benar untuk deployment root
- Fallback URL handling

## 🚀 Fitur Yang Sudah Dikonfigurasi

✅ **HTTPS Force**: Otomatis redirect ke HTTPS di production
✅ **Asset Path**: CSS dan JS akan load dengan benar
✅ **Security**: File sensitif dilindungi dari akses public
✅ **Cache**: Static assets di-cache untuk performa
✅ **Compression**: Gzip untuk file CSS/JS
✅ **Database**: Konfigurasi production ready
✅ **Error Handling**: Debug mode off di production

## 🔍 Troubleshooting

### Jika CSS tidak muncul:
1. Pastikan file `.htaccess` dan `index.php` di root hosting
2. Check permission folder `public/` dan `public/build/`
3. Pastikan APP_URL di .env sesuai domain hosting

### Jika error 500:
1. Check permission folder `storage/` dan `bootstrap/cache/`
2. Pastikan composer install sudah dijalankan
3. Check log error di `storage/logs/`

### Jika routing tidak berfungsi:
1. Pastikan mod_rewrite aktif di hosting
2. Check file `.htaccess` sudah di root hosting
3. Contact hosting support untuk aktivasi mod_rewrite

## 📞 Support
Jika ada masalah deployment, check:
1. File error log di `storage/logs/laravel.log`
2. Error log hosting (biasanya di cPanel)
3. Browser developer tools untuk error asset

---
**Website**: https://tokopinjam.com
**Last Updated**: December 2024
