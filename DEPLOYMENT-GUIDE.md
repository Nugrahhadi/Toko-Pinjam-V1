# Laravel Deployment Guide untuk Hosting

## Masalah: Layout Berantakan setelah Deploy

### Penyebab:
- File Laravel (index.php, .htaccess) dipindah dari folder `public` ke root domain
- Asset paths tidak bisa diakses dengan benar
- Document root tidak dikonfigurasi dengan benar

### Solusi Recommended:

#### Opsi 1: Konfigurasi Document Root (Terbaik)
```apache
# Di cPanel atau konfigurasi hosting, set document root ke:
/home/u424643544/domains/tokopinjam.com/public_html/public

# Atau tambahkan di .htaccess root:
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L]
```

#### Opsi 2: Manual Setup (jika tidak bisa ubah document root)

1. **Copy file-file berikut ke root domain:**
   - Copy `index-root.php` → rename ke `index.php`
   - Copy `.htaccess-root` → rename ke `.htaccess`
   - Copy `public/favicon.ico` ke root
   - Copy `public/robots.txt` ke root

2. **File struktur yang benar:**
```
public_html/
├── index.php (dari index-root.php)
├── .htaccess (dari .htaccess-root)
├── favicon.ico
├── robots.txt
├── public/ (folder asli Laravel public)
│   ├── build/
│   ├── images/
│   └── storage/
├── app/
├── config/
├── resources/
└── vendor/
```

3. **Update environment:**
```bash
# Di server
cd /home/u424643544/domains/tokopinjam.com/public_html
php artisan config:clear
php artisan cache:clear
php artisan view:clear
chmod -R 755 public/
chmod -R 755 storage/
```

### Fitur yang Ditambahkan:

1. **Automatic Asset Path Detection**
   - Sistem otomatis mendeteksi lokasi assets
   - Fallback ke CDN jika build assets tidak tersedia

2. **Environment-based Loading**
   - Production: Prioritas ke compiled assets, fallback CDN
   - Development: Vite hot reload

3. **Security Enhancements**
   - Block akses ke file sensitif (.env, config files)
   - Proper rewrite rules untuk keamanan

### Testing:

1. Buka https://tokopinjam.com
2. Check browser console untuk error CSS/JS
3. Verify semua images dan assets ter-load
4. Test navigation dan fitur interaktif

### Troubleshooting:

- **CSS tidak ter-load:** Check path di browser dev tools
- **JS error:** Verify Alpine.js dan custom scripts
- **404 pada assets:** Check .htaccess rewrite rules
- **500 error:** Check file permissions dan Laravel logs
