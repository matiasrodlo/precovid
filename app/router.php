<?php
// Router for PHP built-in server
$uri = $_SERVER['REQUEST_URI'];

// Serve static files directly
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)$/', $uri)) {
    return false;
}

// Handle JSON files
if (preg_match('/\.json$/', $uri)) {
    $file = __DIR__ . $uri;
    if (file_exists($file)) {
        header('Content-Type: application/json');
        readfile($file);
        exit;
    }
}

// Parse route
$path = trim(parse_url($uri, PHP_URL_PATH), '/');
$_GET['ruta'] = empty($path) ? '' : $path;

require_once __DIR__ . '/index.php'; 