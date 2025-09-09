<?php

/**
 * Debug Storage Files - Check if files exist and are accessible
 */

echo "🔍 Debug Storage Files\n";
echo "====================\n\n";

// Path untuk Hostinger
$projectPath = '/home/u424643544/Toko-Pinjam-V1';
$publicHtmlPath = '/home/u424643544/domains/tokopinjam.com/public_html';

$storagePath = $projectPath . '/storage/app/public';
$storageLink = $publicHtmlPath . '/storage';

echo "📁 Storage Paths:\n";
echo "Project path: $projectPath\n";
echo "Storage path: $storagePath\n";
echo "Storage link: $storageLink\n\n";

// Check if paths exist
echo "📊 Path Status:\n";
echo "Storage folder exists: " . (is_dir($storagePath) ? "✅ YES" : "❌ NO") . "\n";
echo "Storage link exists: " . (is_link($storageLink) ? "✅ YES" : "❌ NO") . "\n";
echo "Storage readable: " . (is_readable($storagePath) ? "✅ YES" : "❌ NO") . "\n";
echo "Storage writable: " . (is_writable($storagePath) ? "✅ YES" : "❌ NO") . "\n\n";

// List files in student-ids folder
$studentIdsPath = $storagePath . '/student-ids';
echo "📄 Student IDs Folder ($studentIdsPath):\n";
if (is_dir($studentIdsPath)) {
    $files = scandir($studentIdsPath);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "  - $file\n";
        }
    }
} else {
    echo "  ❌ Folder does not exist\n";
}

echo "\n";

// List files in items folder  
$itemsPath = $storagePath . '/items';
echo "📦 Items Folder ($itemsPath):\n";
if (is_dir($itemsPath)) {
    $files = scandir($itemsPath);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "  - $file\n";
        }
    }
} else {
    echo "  ❌ Folder does not exist\n";
}

echo "\n";

// Test specific file access
$testFile = 'VcRSiWr21ftkYEjxWjPAvxmVwTAVIgCwJrbaZrMt.jpg';
$fullPath = $studentIdsPath . '/' . $testFile;

echo "🔍 Test File Access:\n";
echo "File: $testFile\n";
echo "Full path: $fullPath\n";
echo "File exists: " . (file_exists($fullPath) ? "✅ YES" : "❌ NO") . "\n";
echo "File readable: " . (is_readable($fullPath) ? "✅ YES" : "❌ NO") . "\n";

if (file_exists($fullPath)) {
    echo "File size: " . filesize($fullPath) . " bytes\n";
    echo "File permissions: " . substr(sprintf('%o', fileperms($fullPath)), -4) . "\n";
}

echo "\n";

// Test URL access
echo "🌐 URL Test:\n";
echo "Storage URL: https://tokopinjam.com/storage/student-ids/$testFile\n";
echo "Expected file path: $fullPath\n";

// Check web access
$context = stream_context_create([
    'http' => [
        'timeout' => 5,
        'method' => 'HEAD'
    ]
]);

$url = "https://tokopinjam.com/storage/student-ids/$testFile";
$headers = @get_headers($url, 1, $context);

if ($headers) {
    echo "HTTP Status: " . $headers[0] . "\n";
} else {
    echo "❌ Could not access URL\n";
}

echo "\n🎯 Recommendations:\n";

if (!is_link($storageLink)) {
    echo "1. Run: ln -s $storagePath $storageLink\n";
}

if (!is_dir($studentIdsPath)) {
    echo "2. Create student-ids folder: mkdir -p $studentIdsPath\n";
}

echo "3. Set permissions: chmod -R 755 $storagePath\n";
echo "4. Check .htaccess in public_html for proper rewrite rules\n";

?>
