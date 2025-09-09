<?php

/**
 * Production Cache Clear Helper
 * Upload file ini ke root directory production dan akses via browser
 * untuk clear cache tanpa SSH access
 */

// Basic security - hanya bisa diakses dari specific IP (opsional)
// $allowed_ips = ['127.0.0.1', 'YOUR_IP_HERE'];
// if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
//     die('Access denied');
// }

echo "<h2>🧹 Toko Pinjam - Production Cache Clear</h2>";

try {
    // Pastikan kita di root Laravel
    if (!file_exists('artisan')) {
        die('❌ Error: File artisan tidak ditemukan. Pastikan file ini di root Laravel.');
    }

    echo "<p>🔄 Clearing caches...</p>";

    // Clear route cache
    $output1 = shell_exec('php artisan route:clear 2>&1');
    echo "<p>✅ Route cache: " . htmlspecialchars($output1) . "</p>";

    // Clear config cache
    $output2 = shell_exec('php artisan config:clear 2>&1');
    echo "<p>✅ Config cache: " . htmlspecialchars($output2) . "</p>";

    // Clear view cache
    $output3 = shell_exec('php artisan view:clear 2>&1');
    echo "<p>✅ View cache: " . htmlspecialchars($output3) . "</p>";

    // Clear application cache
    $output4 = shell_exec('php artisan cache:clear 2>&1');
    echo "<p>✅ Application cache: " . htmlspecialchars($output4) . "</p>";

    // Optimize untuk production
    $output5 = shell_exec('php artisan optimize 2>&1');
    echo "<p>🚀 Optimization: " . htmlspecialchars($output5) . "</p>";

    echo "<p><strong>✅ Cache clearing berhasil!</strong></p>";
    echo "<p>🌐 Website tokopinjam.com sekarang sudah dioptimasi dan error seharusnya sudah hilang.</p>";

    // Hapus file ini setelah digunakan untuk keamanan
    echo "<p><em>💡 Tip: Hapus file clear-cache.php ini setelah selesai untuk keamanan.</em></p>";
} catch (Exception $e) {
    echo "<p>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "<hr>";
echo "<p><small>Generated at: " . date('Y-m-d H:i:s') . "</small></p>";
