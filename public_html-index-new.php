<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../Toko-Pinjam-V1/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../Toko-Pinjam-V1/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

/** @var Application $app */
$app = require_once __DIR__.'/../Toko-Pinjam-V1/bootstrap/app.php';

// Set the public path for proper asset handling
$app->usePublicPath(__DIR__.'/../Toko-Pinjam-V1/public');

$app->handleRequest(Request::capture());
