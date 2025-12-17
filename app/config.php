<?php
/**
 * Configuration File
 * Loads environment variables and sets up application configuration
 */

// Load .env file
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Skip comments
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim(trim($value), '"\'');
            if (!empty($key)) {
                $_ENV[$key] = $value;
            }
        }
    }
}

// Helper function to get environment variable with default
function env($key, $default = null) {
    return isset($_ENV[$key]) ? $_ENV[$key] : $default;
}

// Set application environment
$app_env = env('APP_ENV', 'development');

// Define constants based on environment
define('APP_ENV', $app_env);
define('RUTA', env('RUTA', 'http://localhost:8000'));
define('API_ENDPOINT', env('API_ENDPOINT', ''));
define('ERROR_LOGGING', env('ERROR_LOGGING', 'true') === 'true');
define('LOG_FILE', env('LOG_FILE', __DIR__ . '/../logs/error.log'));
define('CSRF_SECRET', env('CSRF_SECRET', 'default-secret-change-in-production'));

// Static resource paths (relative)
define('RES_IMAGES', '/static/images');
define('RES_STYLESHEETS', '/static/css');
define('RES_JAVASCRIPTS', '/static/js');

// Application metadata
define('TITULO', env('APP_TITLE', 'Precovid &#8211; Haz tu autoevaluación del COVID-19'));
define('DESCRIPCION', env('APP_DESCRIPTION', 'Evalúa tu salud y recibe instrucciones y recomendaciones sobre el COVID-19.'));

// Error reporting based on environment
if ($app_env === 'production') {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
}

