<?php

/**
 * Hostinger Setup Script
 * Buat symbolic links untuk storage, images, dan assets
 */

echo "🚀 Starting Hostinger setup...\n";

// Konfigurasi path untuk Hostinger
$projectPath = '/home/u424643544/Toko-Pinjam-V1';
$publicHtmlPath = '/home/u424643544/domains/tokopinjam.com/public_html';

// Buat symbolic link untuk storage (file uploads)
$storagePath = $projectPath . '/storage/app/public';
$storageLink = $publicHtmlPath . '/storage';

if (is_link($storageLink)) {
    unlink($storageLink);
    echo "🗑️ Removed existing storage link\n";
}

if (symlink($storagePath, $storageLink)) {
    echo "✅ Storage link created: $storageLink -> $storagePath\n";
} else {
    echo "❌ Failed to create storage link\n";
}

// Buat symbolic link untuk images
$imagesPath = $projectPath . '/public/images';
$imagesLink = $publicHtmlPath . '/images';

if (is_link($imagesLink)) {
    unlink($imagesLink);
    echo "🗑️ Removed existing images link\n";
}

if (symlink($imagesPath, $imagesLink)) {
    echo "✅ Images link created: $imagesLink -> $imagesPath\n";
} else {
    echo "❌ Failed to create images link\n";
}

// Buat symbolic link untuk build assets (CSS/JS)
$buildPath = $projectPath . '/public/build';
$buildLink = $publicHtmlPath . '/build';

if (is_link($buildLink)) {
    unlink($buildLink);
    echo "🗑️ Removed existing build link\n";
}

if (is_dir($buildPath) && symlink($buildPath, $buildLink)) {
    echo "✅ Build assets link created: $buildLink -> $buildPath\n";
} else {
    echo "⚠️ Build assets not found or failed to link\n";
}

// Buat symbolic link untuk CKEditor
$ckeditorPath = $projectPath . '/public/ckeditor';
$ckeditorLink = $publicHtmlPath . '/ckeditor';

if (is_link($ckeditorLink)) {
    unlink($ckeditorLink);
}

if (is_dir($ckeditorPath) && symlink($ckeditorPath, $ckeditorLink)) {
    echo "✅ CKEditor link created: $ckeditorLink -> $ckeditorPath\n";
}

// Test storage accessibility
echo "\n🔍 Testing storage access...\n";
if (is_readable($storagePath)) {
    echo "✅ Storage folder is readable\n";
} else {
    echo "❌ Storage folder is not readable\n";
}

if (is_writable($storagePath)) {
    echo "✅ Storage folder is writable\n";
} else {
    echo "❌ Storage folder is not writable\n";
}

// Set permissions
chmod($storagePath, 0755);
chmod($projectPath . '/storage', 0755);
chmod($projectPath . '/storage/app', 0755);

echo "\n🎉 Setup completed!\n";
echo "Test URL: https://tokopinjam.com/storage/test.jpg\n";
echo "Storage path: $storagePath\n";
echo "Storage link: $storageLink\n";

?>
