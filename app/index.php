<?php

// --- Configuration -------------------------------------------------------------------------
// Load configuration and helper functions
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Start session for CSRF protection
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Default Page --------------------------------------------------------------------------
// Set the default page to the home view. This will be overridden if a route is specified.
$pagina = 'views/home.php';

// --- Form Submission -----------------------------------------------------------------------
// Handle form submission for the self-assessment. This block processes POST requests from the form.
// Only process if this is the symptom questionnaire (has symptom fields), not the login form
// Check for symptom form by looking for symptom fields (more reliable than button name)
if(isset($_POST['falta_aire']) || isset($_POST['fiebre']) || isset($_POST['tos'])) {
    // Security checks
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        log_error('CSRF token validation failed', ['ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown']);
        header("HTTP/1.1 403 Forbidden");
        die('Invalid request. Please try again.');
    }
    if (!check_rate_limit(10, 3600)) { // 10 requests per hour
        log_error('Rate limit exceeded', ['ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown']);
        header("HTTP/1.1 429 Too Many Requests");
        die('Too many requests. Please try again later.');
    }
    
    // Sanitize inputs
    $args = array(
        'nombre' => FILTER_SANITIZE_STRING,
        'edad' => FILTER_SANITIZE_NUMBER_INT,
        'correo' => FILTER_SANITIZE_EMAIL,
        'region' => FILTER_SANITIZE_STRING,
        'prueba_reciente' => FILTER_SANITIZE_STRING,
        'comorbilidades' => array('filter' => FILTER_SANITIZE_STRING, 'flags' => FILTER_REQUIRE_ARRAY),
        'falta_aire' => FILTER_SANITIZE_STRING, // p1
        'fiebre' => FILTER_SANITIZE_STRING,     // p2
        'tos' => FILTER_SANITIZE_STRING,        // p3
        'contacto' => FILTER_SANITIZE_STRING,   // p4
        'mucosidad' => FILTER_SANITIZE_STRING,  // p5
        'muscular' => FILTER_SANITIZE_STRING,   // p6
        'gastro' => FILTER_SANITIZE_STRING,     // p7
        'muchos_dias' => FILTER_SANITIZE_STRING, // p8
        'perdida_gusto_olfato' => FILTER_SANITIZE_STRING, // p9
        'fatiga' => FILTER_SANITIZE_STRING,     // p10
        'dolor_cabeza' => FILTER_SANITIZE_STRING, // p11
        'dolor_garganta' => FILTER_SANITIZE_STRING // p12
    );
    $entradas = filter_input_array(INPUT_POST, $args);

    if ($entradas === null || $entradas === false) {
        log_error('filter_input_array failed', ['post_data' => array_keys($_POST)]);
        header("Location: " . RUTA);
        exit;
    }
    if (isset($entradas['region']) && !validate_country($entradas['region'])) {
        log_error('Invalid country selected', ['country' => $entradas['region']]);
    }

    $prueba_reciente = isset($entradas['prueba_reciente']) ? $entradas['prueba_reciente'] : 'no';
    $comorbilidades = isset($entradas['comorbilidades']) && is_array($entradas['comorbilidades']) 
        ? $entradas['comorbilidades'] 
        : array();
    if (in_array('ninguna', $comorbilidades)) {
        $comorbilidades = array('ninguna'); // Clear others if "none" selected
    }

    // Prepare data for API and calculation
    $datos = array(
        'nombre' => $entradas['nombre'],
        'edad' => $entradas['edad'],
        'correo' => $entradas['correo'],
        'calle' => 'org', // Legacy field
        'comuna' => 'org', // Legacy field
        'ciudad' => 'org', // Legacy field
        'region' => $entradas['region'],
        'prueba_reciente' => $prueba_reciente,
        'comorbilidades' => $comorbilidades,
        'p1' => $entradas['falta_aire'],
        'p2' => $entradas['fiebre'],
        'p3' => $entradas['tos'],
        'p4' => $entradas['contacto'],
        'p5' => $entradas['mucosidad'],
        'p6' => $entradas['muscular'],
        'p7' => $entradas['gastro'],
        'p8' => $entradas['muchos_dias'],
        'p9' => isset($entradas['perdida_gusto_olfato']) ? $entradas['perdida_gusto_olfato'] : 'no',
        'p10' => isset($entradas['fatiga']) ? $entradas['fatiga'] : 'no',
        'p11' => isset($entradas['dolor_cabeza']) ? $entradas['dolor_cabeza'] : 'no',
        'p12' => isset($entradas['dolor_garganta']) ? $entradas['dolor_garganta'] : 'no'
    );

    // External API call (non-blocking, optional)
    if (!empty(API_ENDPOINT)) {
        $curl_object = curl_init(API_ENDPOINT);
    curl_setopt_array($curl_object, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FAILONERROR => 0, // Non-blocking
            CURLOPT_VERBOSE => 0,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPAUTH => CURLAUTH_ANYSAFE,
            CURLOPT_POSTFIELDS => json_encode($datos),
        CURLOPT_HTTPHEADER => array(
            'User-Agent: PrecovidOrg/1.0.1',
            'Accept: */*',
            'Content-Type: application/json'
        )
    ));
        $api_response = @curl_exec($curl_object);
        $curl_error = curl_error($curl_object);
        $http_code = curl_getinfo($curl_object, CURLINFO_HTTP_CODE);
        curl_close($curl_object);
        if ($curl_error || ($http_code && $http_code >= 400)) {
            log_error('API call failed', ['error' => $curl_error, 'http_code' => $http_code, 'endpoint' => API_ENDPOINT]);
        }
    }

    // Risk calculation
    $prob = 0;
    $age = max(0, min(120, intval($entradas['edad']))); // Clamp age 0-120
    
    // Symptom scoring (weights based on COVID-19 specificity)
    $prob += ($datos['p9'] === "si") ? 35 : 0; // Loss taste/smell (highly specific)
    $prob += ($datos['p1'] === "si") ? 30 : 0; // Shortness of breath
    $prob += ($datos['p4'] === "si") ? 30 : 0; // Contact with positive case
    $prob += ($datos['p2'] === "si") ? 20 : 0; // Fever
    $prob += ($datos['p3'] === "si") ? 18 : 0; // Cough
    $prob += ($datos['p10'] === "si") ? 12 : 0; // Fatigue
    $prob += ($datos['p6'] === "si") ? 10 : 0; // Muscle pain
    $prob += ($datos['p11'] === "si") ? 8 : 0; // Headache
    $prob += ($datos['p12'] === "si") ? 8 : 0; // Sore throat
    $prob += ($datos['p8'] === "si") ? 8 : 0; // Duration >7 days
    $prob += ($datos['p5'] === "si") ? 5 : -8; // Nasal mucus (less common in COVID)
    $prob += ($datos['p7'] === "si") ? 5 : -8; // GI symptoms (less common in COVID)
    
    // Symptom combination bonuses
    $combination_bonus = 0;
    if ($datos['p1'] === "si" && $datos['p2'] === "si" && $datos['p3'] === "si") {
        $combination_bonus += 15; // Classic triad
    }
    if ($datos['p9'] === "si" && ($datos['p1'] === "si" || $datos['p3'] === "si")) {
        $combination_bonus += 10; // Loss taste/smell + respiratory
    }
    if ($datos['p4'] === "si" && ($datos['p1'] === "si" || $datos['p2'] === "si" || $datos['p3'] === "si")) {
        $combination_bonus += 8; // Contact + symptoms
    }
    if ($datos['p2'] === "si" && $datos['p9'] === "si") {
        $combination_bonus += 5; // Fever + loss taste/smell
    }
    $prob += $combination_bonus;
    
    // Test history adjustment
    if ($prueba_reciente === 'positiva') {
        header("Location: " . RUTA . "/resultados/positivo?severity=high&score=100&reason=test_positive");
        exit;
    }
    $test_adjustment = ($prueba_reciente === 'negativa') ? -5 : 0;
    
    // Comorbidity risk adjustment
    $comorbidity_bonus = 0;
    $has_comorbidities = !empty($comorbilidades) && !in_array('ninguna', $comorbilidades);
    if ($has_comorbidities) {
        $comorbidity_bonus = count($comorbilidades) * 8; // 8 points per comorbidity
        $high_risk_comorb = array('corazon', 'pulmon', 'inmuno', 'renal');
        foreach ($comorbilidades as $comorb) {
            if (in_array($comorb, $high_risk_comorb)) {
                $comorbidity_bonus += 5; // Extra for high-risk conditions
            }
        }
    }
    $prob += $comorbidity_bonus + $test_adjustment;
    
    // Age-based risk multiplier
    $age_multiplier = 1.0;
    if ($age >= 65) {
        $age_multiplier = 1.5; // Higher risk for elderly
    } elseif ($age >= 50) {
        $age_multiplier = 1.3; // Moderate risk for middle-aged
    } elseif ($age < 18) {
        $age_multiplier = 0.8; // Lower risk for children
    }
    $final_score = max(0, ($prob * $age_multiplier)); // Prevent negative scores
    
    // Dynamic threshold (adjusts based on risk factors)
    $base_threshold = 40;
    if ($age >= 65) {
        $base_threshold = 35; // More sensitive for elderly
    } elseif ($age < 18) {
        $base_threshold = 45; // Less sensitive for children
    }
    if ($datos['p4'] === "si") {
        $base_threshold = 35; // Lower if exposed
    }
    if ($has_comorbidities) {
        $base_threshold = 35; // Lower if has comorbidities
    }
    $threshold = $base_threshold;
    
    // Emergency detection (shortness of breath = medical emergency)
    if ($datos['p1'] === "si") {
        $preliminary_severity = 'high';
        if (!headers_sent()) {
            header("Location: " . RUTA . "/resultados/emergencia?severity=" . urlencode($preliminary_severity));
        } else {
            echo "<script>window.location.href = '" . RUTA . "/resultados/emergencia?severity=" . urlencode($preliminary_severity) . "';</script>";
        }
        exit;
    }
    
    // Result determination
    $is_positive = false;
    if ($final_score >= $threshold) {
        $is_positive = true;
    }
    if ($datos['p1'] === "si" && $datos['p2'] === "si" && $datos['p3'] === "si") {
        $is_positive = true; // Classic triad
    }
    if ($datos['p9'] === "si" && ($datos['p1'] === "si" || $datos['p3'] === "si")) {
        $is_positive = true; // Loss taste/smell + respiratory
    }
    if ($datos['p4'] === "si") {
        $symptom_count = 0;
        if ($datos['p1'] === "si") $symptom_count++;
        if ($datos['p2'] === "si") $symptom_count++;
        if ($datos['p3'] === "si") $symptom_count++;
        if ($datos['p9'] === "si") $symptom_count++;
        if ($symptom_count >= 2) {
            $is_positive = true; // Contact + 2+ symptoms
        }
    }
    
    // Severity assessment
    $severity_adjustment = 0;
    if ($has_comorbidities) {
        $severity_adjustment += 10;
    }
    if ($age >= 50 && $has_comorbidities) {
        $severity_adjustment += 5; // Elderly with comorbidities
    }
    $adjusted_score = $final_score + $severity_adjustment;
    
    $severity = 'low';
    if ($adjusted_score >= 70) {
        $severity = 'high';
    } elseif ($adjusted_score >= 50) {
        $severity = 'moderate';
    } elseif ($adjusted_score >= $threshold) {
        $severity = 'low_moderate';
    }
    if ($age >= 65 && $has_comorbidities && $adjusted_score >= 40) {
        $severity = 'high'; // High-risk override
    }
    
    // Redirect to results
    if ($is_positive) {
        $params = "severity=" . urlencode($severity) . "&score=" . round($adjusted_score);
        if ($has_comorbidities) {
            $params .= "&comorbidities=yes";
        }
        $redirect_url = RUTA . "/resultados/positivo?" . $params;
    } else {
        $redirect_url = RUTA . "/resultados/negativo?score=" . round($adjusted_score);
    }
    if (!headers_sent()) {
        header("Location: " . $redirect_url);
        exit;
    } else {
        echo "<script>window.location.href = '" . $redirect_url . "';</script>";
        exit;
    }
}

// Page routing
if(isset($_GET['ruta']) && !empty($_GET['ruta'])) {
    $ruta = filter_var($_GET['ruta'], FILTER_SANITIZE_URL);
    $auxiliar = 'views/' . $ruta . '.php';
    if(file_exists($auxiliar)) {
        $pagina = $auxiliar;
    } else {
        $path_parts = explode('/', $ruta);
        if (count($path_parts) > 1) {
            $base_dir = 'views/' . $path_parts[0] . '/';
            $file_name = $path_parts[1] . '.php';
            if (file_exists($base_dir . $file_name)) {
                $pagina = $base_dir . $file_name;
            } else {
                $not_found = 'views/404.php';
                if(file_exists($not_found)) {
                    $pagina = $not_found;
                    http_response_code(404);
                } else {
                    $pagina = 'views/home.php';
                }
            }
        } else {
            $not_found = 'views/404.php';
            if(file_exists($not_found)) {
                $pagina = $not_found;
                http_response_code(404);
            } else {
                $pagina = 'views/home.php';
            }
        }
    }
}

// Render page
require_once('views/partials/head.php');
if($pagina === 'views/home.php') {
    require_once('views/partials/navbar.php');
}
require_once($pagina);
?>
    </body>
</html>