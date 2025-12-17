<?php
/**
 * Helper Functions
 * Common utility functions for the application
 */

// CSRF token generation
function generate_csrf_token() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// CSRF token verification
function verify_csrf_token($token) {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

// Error logging
function log_error($message, $context = []) {
    if (!ERROR_LOGGING) {
        return;
    }
    $log_dir = dirname(LOG_FILE);
    if (!is_dir($log_dir)) {
        @mkdir($log_dir, 0755, true);
    }
    $timestamp = date('Y-m-d H:i:s');
    $context_str = !empty($context) ? ' ' . json_encode($context) : '';
    $log_message = "[{$timestamp}] {$message}{$context_str}" . PHP_EOL;
    @file_put_contents(LOG_FILE, $log_message, FILE_APPEND | LOCK_EX);
}

// Country validation
function validate_country($country) {
    $countries_file = __DIR__ . '/../static/json/countries.min.json';
    if (!file_exists($countries_file)) {
        return false;
    }
    $countries = json_decode(file_get_contents($countries_file), true);
    if (!$countries) {
        return false;
    }
    foreach ($countries as $country_data) {
        if (isset($country_data['name']) && $country_data['name'] === $country) {
            return true;
        }
    }
    return false;
}

// Rate limiting (IP-based)
function check_rate_limit($max_requests = 10, $time_window = 3600) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $rate_limit_file = __DIR__ . '/../logs/rate_limit.json';
    $data = [];
    if (file_exists($rate_limit_file)) {
        $data = json_decode(file_get_contents($rate_limit_file), true) ?: [];
    }
    $now = time();
    $key = $ip;
    if (isset($data[$key])) {
        $requests = array_filter($data[$key], function($timestamp) use ($now, $time_window) {
            return ($now - $timestamp) < $time_window;
        });
        $data[$key] = array_values($requests);
    } else {
        $data[$key] = [];
    }
    if (count($data[$key]) >= $max_requests) {
        return false;
    }
    $data[$key][] = $now;
    @file_put_contents($rate_limit_file, json_encode($data), LOCK_EX);
    return true;
}

