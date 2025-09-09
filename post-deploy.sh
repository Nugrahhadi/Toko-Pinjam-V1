#!/bin/bash

# Hostinger Post-Deployment Script
# Jalankan script ini setelah CI/CD selesai upload files

echo "🚀 Starting post-deployment setup..."

# Set working directory
cd /home/u424643544/Toko-Pinjam-V1

# Set proper file permissions
echo "📁 Setting file permissions..."
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 755 public/
chmod 644 .env

# Clear Laravel caches
echo "🧹 Clearing Laravel caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Run setup script
echo "🔧 Running Hostinger setup script..."
php hostinger-setup.php

# Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage directories if they don't exist
mkdir -p storage/app/public/student-ids
mkdir -p storage/app/public/items
mkdir -p storage/app/public/blog-images

# Test website
echo "🌐 Testing website..."
curl -s -o /dev/null -w "%{http_code}" https://tokopinjam.com/ | grep -q "200" && echo "✅ Website is accessible" || echo "❌ Website check failed"

echo "🎉 Post-deployment setup completed!"
echo "Website: https://tokopinjam.com/"
