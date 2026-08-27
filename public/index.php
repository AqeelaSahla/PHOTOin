<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Temporary debug to find the empty driver
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();
dd([
    'session.driver' => config('session.driver'),
    'cache.default' => config('cache.default'),
    'queue.default' => config('queue.default'),
    'database.default' => config('database.default'),
    'app.maintenance.driver' => config('app.maintenance.driver'),
    'hashing.driver' => config('hashing.driver'),
]);

$app->handleRequest(Request::capture());
