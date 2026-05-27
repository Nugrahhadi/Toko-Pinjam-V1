<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Start output buffering so we can sanitize injected HTML before sending.
ob_start(function (string $buffer): string {
    return \App\Http\Middleware\SanitizeResponse::sanitizeHtmlInjection($buffer);
});

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Request::capture());

while (ob_get_level() > 0) {
    ob_end_flush();
}
