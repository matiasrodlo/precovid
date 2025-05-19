<?php
// Get the request URI
$uri = $_SERVER['REQUEST_URI'];

// If the request is for a static file, serve it directly
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)$/', $uri)) {
    return false;    // serve the requested resource as-is.
}

// Handle JSON files specifically
if (preg_match('/\.json$/', $uri)) {
    $file = __DIR__ . $uri;
    if (file_exists($file)) {
        header('Content-Type: application/json');
        readfile($file);
        exit;
    }
}

// Parse the URL path
$path = parse_url($uri, PHP_URL_PATH);
$path = trim($path, '/');

// Set the route parameter
if (empty($path)) {
    $_GET['ruta'] = '';
} else {
    $_GET['ruta'] = $path;
}

// Include the main application file
require_once __DIR__ . '/index.php'; 