<?php

// --- Constants -----------------------------------------------------------------------------
// Define base URLs and resource paths for the application.
// Only one RUTA should be active at a time (local, staging, or production).
//define('RUTA', 'https://www.precovid.cl');
define('RUTA', 'http://localhost:8000');
//define('RUTA', 'https://www.precovid.cl/v3');
//define('RUTA', 'https://www.precovid.org');

// Use relative paths for static resources
// define('RES_IMAGES', RUTA . '/res/images'); // Path to images
// define('RES_STYLESHEETS', RUTA . '/res/stylesheets'); // Path to CSS
// define('RES_JAVASCRIPTS', RUTA . '/res/javascripts'); // Path to JS
define('RES_IMAGES', '/static/images'); // Path to images
define('RES_STYLESHEETS', '/static/css'); // Path to CSS
define('RES_JAVASCRIPTS', '/static/js'); // Path to JS

define('TITULO', 'Precovid &#8211; Haz tu autoevaluación del COVID-19'); // Page title
define('DESCRIPCION', 'Evalúa tu salud y recibe instrucciones y recomendaciones sobre el COVID-19.'); // Meta description

// --- Default Page --------------------------------------------------------------------------
// Set the default page to the home view. This will be overridden if a route is specified.
$pagina = 'views/home.php';

// --- Form Submission -----------------------------------------------------------------------
// Handle form submission for the self-assessment. This block processes POST requests from the form.
if(isset($_POST['formulario']) && empty($_POST['formulario'])) {
    // Sanitize input fields to prevent XSS and ensure data integrity.
    $args = array(
        'nombre' => FILTER_SANITIZE_STRING,      // User's name
        'rut' => FILTER_SANITIZE_STRING,         // National ID (Chile)
        'edad' => FILTER_SANITIZE_NUMBER_INT,    // Age
        'correo' => FILTER_SANITIZE_EMAIL,       // Email
        'region' => FILTER_SANITIZE_STRING,      // Region
        'ciudad' => FILTER_SANITIZE_STRING,      // City
        'falta_aire' => FILTER_SANITIZE_STRING,  // Symptom: shortness of breath
        'fiebre' => FILTER_SANITIZE_STRING,      // Symptom: fever
        'tos' => FILTER_SANITIZE_STRING,         // Symptom: cough
        'contacto' => FILTER_SANITIZE_STRING,    // Symptom: contact with positive case
        'mucosidad' => FILTER_SANITIZE_STRING,   // Symptom: nasal mucus
        'muscular' => FILTER_SANITIZE_STRING,    // Symptom: muscle pain
        'gastro' => FILTER_SANITIZE_STRING,      // Symptom: gastrointestinal
        'muchos_dias' => FILTER_SANITIZE_STRING  // Symptom: many days with symptoms
    );
    $entradas = filter_input_array(INPUT_POST, $args);

    // Prepare data array for external API and risk calculation.
    $datos = array(
        'nombre' => $entradas['nombre'],
        'rut' => $entradas['rut'],
        'edad' => $entradas['edad'],
        'correo' => $entradas['correo'],
        'calle' => 'org', // Not collected, set as 'org' for compatibility
        'comuna' => 'org', // Not collected, set as 'org' for compatibility
        'ciudad' => $entradas['ciudad'],
        'region' => $entradas['region'],
        'p1' => $entradas['falta_aire'],
        'p2' => $entradas['fiebre'],
        'p3' => $entradas['tos'],
        'p4' => $entradas['contacto'],
        'p5' => $entradas['mucosidad'],
        'p6' => $entradas['muscular'],
        'p7' => $entradas['gastro'],
        'p8' => $entradas['muchos_dias']
    );

    // --- External API Call ------------------------------------------------------------------
    // Send sanitized data to external endpoint for logging and analytics.
    $curl_object = curl_init('http://precovid.conmapas.cl/nuevaTest');
    curl_setopt_array($curl_object, array(
        CURLOPT_RETURNTRANSFER => 1, // Return response as string
        CURLOPT_FOLLOWLOCATION => 0, // Do not follow redirects
        CURLOPT_ENCODING => '',      // Handle all encodings
        CURLOPT_CONNECTTIMEOUT => 10, // Connection timeout
        CURLOPT_TIMEOUT => 10,        // Execution timeout
        CURLOPT_FAILONERROR => 1,     // Fail on HTTP error
        CURLOPT_VERBOSE => 1,         // Verbose output for debugging
        CURLOPT_POST => 1,            // Use POST method
        CURLOPT_CUSTOMREQUEST => 'POST', // Explicitly set POST
        CURLOPT_HEADER => 1,          // Include headers in output
        CURLOPT_HTTPAUTH => CURLAUTH_ANYSAFE, // Use any safe HTTP auth
        CURLOPT_POSTFIELDS => json_encode($datos), // Send data as JSON
        CURLOPT_HTTPHEADER => array(
            'User-Agent: PrecovidOrg/1.0.1',
            'Accept: */*',
            'Content-Type: application/json'
        )
    ));
    $res = curl_exec($curl_object); // Execute the request (response is not used)

    // --- Risk Calculation -------------------------------------------------------------------
    // COVID-19 Symptom Detection Logic
    // This section implements a weighted scoring system based on early COVID-19 research
    // and clinical observations. The system uses two main criteria:
    // 1. A probability threshold (50%) based on weighted symptoms
    // 2. Presence of the three main symptoms (shortness of breath, fever, cough)
    
    // Initialize probability score
    $prob = 0;
    
    // Primary Symptoms (20 points each)
    // These are the most common and significant symptoms of COVID-19
    // Having all three automatically triggers a positive result
    $prob += ($datos['p1'] === "si") ? 20 : 0;         // Shortness of breath - Key respiratory symptom
    $prob += ($datos['p2'] === "si") ? 20 : 0;         // Fever - Common in COVID-19 cases
    $prob += ($datos['p3'] === "si") ? 20 : 0;         // Cough - Persistent dry cough is typical
    
    // Contact History (30 points)
    // Highest weight as contact with confirmed cases is a major risk factor
    $prob += ($datos['p4'] === "si") ? 30 : 0;         // Contact with positive case
    
    // Secondary Symptoms (12.5 points each)
    // These symptoms help differentiate COVID-19 from other conditions
    // Some have negative weights when absent to reduce false positives
    $prob += ($datos['p5'] === "si") ? 12.5 : -12.5;   // Nasal mucus - Less common in COVID-19
    $prob += ($datos['p6'] === "si") ? 12.5 : 0;       // Muscle pain - Common but not specific
    $prob += ($datos['p7'] === "si") ? 12.5 : -12.5;   // Gastrointestinal - Less common in COVID-19
    $prob += ($datos['p8'] === "si") ? 12.5 : 0;       // Duration - Longer symptoms may indicate COVID-19

    // --- Result Determination ---------------------------------------------------------------
    // Two criteria for positive result:
    // 1. Probability score >= 50% (multiple symptoms present)
    // 2. All three primary symptoms present (shortness of breath, fever, cough)
    if($prob >= 50 || ($datos['p1'] === "si" && $datos['p2'] === "si" && $datos['p3'] === "si")) {
        // High risk: redirect to positive result
        header("Location: " . RUTA . "/resultados/positivo");
    } else {
        // Low risk: redirect to negative result
        header("Location: " . RUTA . "/resultados/negativo");
    }
    exit; // Stop further execution after redirect
}

// --- Page Routing --------------------------------------------------------------------------
// If a specific route is requested (via GET), load the corresponding view file.
if(isset($_GET['ruta'])) {
    $ruta = filter_var($_GET['ruta'], FILTER_SANITIZE_URL); // Sanitize route
    $auxiliar = 'views/' . $ruta . '.php'; // Build path to view
    if(file_exists($auxiliar)) {
        $pagina = $auxiliar; // Set page to requested view
    }
}

// --- Render Page ---------------------------------------------------------------------------
// Include the header, main content, and footer for the current page.
require_once('views/partials/header.php');
require_once($pagina);
require_once('views/partials/footer.php');

?>