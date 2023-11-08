<?php

    // Constants -------------------------------------------------------------------------------

    //define('RUTA', 'https://www.precovid.cl');
    //define('RUTA', '//localhost/precovid2');
    //define('RUTA', 'https://www.precovid.cl/v3');
    define('RUTA', 'https://www.precovid.org');
    define('RES_IMAGES', RUTA . '/res/images');
    define('RES_STYLESHEETS', RUTA . '/res/stylesheets');
    define('RES_JAVASCRIPTS', RUTA . '/res/javascripts');

    define('TITULO', 'Precovid &#8211; Haz tu autoevaluación del COVID-19');
    define('DESCRIPCION', 'Evalúa tu salud y recibe instrucciones y recomendaciones sobre el COVID-19.');

    // Attributes ------------------------------------------------------------------------------

    // Contenido por defecto
    $pagina = 'views/home.php';

    // POSTS -----------------------------------------------------------------------------------

    // Enviar a base de datos
    if(isset($_POST['formulario']) && empty($_POST['formulario'])) {
        // Sanitizar elementos
        $args = array(
            'nombre' => FILTER_SANITIZE_STRING,
            'rut' => FILTER_SANITIZE_STRING,
            'edad' => FILTER_SANITIZE_NUMBER_INT,
            'telefono' => FILTER_SANITIZE_NUMBER_INT,
            'correo' => FILTER_SANITIZE_EMAIL,
            'region' => FILTER_SANITIZE_STRING,
            'ciudad' => FILTER_SANITIZE_STRING,
            'falta_aire' => FILTER_SANITIZE_STRING,
            'fiebre' => FILTER_SANITIZE_STRING,
            'tos' => FILTER_SANITIZE_STRING,
            'contacto' => FILTER_SANITIZE_STRING,
            'mucosidad' => FILTER_SANITIZE_STRING,
            'muscular' => FILTER_SANITIZE_STRING,
            'gastro' => FILTER_SANITIZE_STRING,
            'muchos_dias' => FILTER_SANITIZE_STRING
        );
        $entradas = filter_input_array(INPUT_POST, $args);

        $datos = array(
            'nombre' => $entradas['nombre'],
            'rut' => $entradas['rut'],
            'edad' => $entradas['edad'],
            'telefono' => $entradas['telefono'],
            'correo' => $entradas['correo'],
            'calle' => 'org',
            'comuna' => 'org',
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

        // Configurar POST y enviar datos
        $curl_object = curl_init('http://precovid.conmapas.cl/nuevaTest');
        curl_setopt_array($curl_object, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FAILONERROR => 1,
            CURLOPT_VERBOSE => 1,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HEADER => 1,
            CURLOPT_HTTPAUTH => CURLAUTH_ANYSAFE,
            CURLOPT_POSTFIELDS => json_encode($datos),
            CURLOPT_HTTPHEADER => array(
                'User-Agent: PrecovidOrg/1.0.1',
                'Accept: */*',
                'Content-Type: application/json'
            )
        ));

        $res = curl_exec($curl_object);

        // Calcular probabilidad de tener el virus
        $prob = 0;
        $prob += ($datos['p1'] === "si") ? 20 : 0;
        $prob += ($datos['p2'] === "si") ? 20 : 0;
        $prob += ($datos['p3'] === "si") ? 20 : 0;
        $prob += ($datos['p4'] === "si") ? 30 : 0;
        $prob += ($datos['p5'] === "si") ? 12.5 : -12.5;
        $prob += ($datos['p6'] === "si") ? 12.5 : 0;
        $prob += ($datos['p7'] === "si") ? 12.5 : -12.5;
        $prob += ($datos['p8'] === "si") ? 12.5 : 0;

        if($prob >= 50 || ($datos['p1'] === "si" && $datos['p2'] === "si" && $datos['p3'] === "si")) {
            // Positivo
            header("Location: " . RUTA . "/resultados/positivo");
        } else {
            // Negativo
            header("Location: " . RUTA . "/resultados/negativo");
        }

    } // END: Enviar a base de datos

    // Load content ----------------------------------------------------------------------------

    if(isset($_GET['ruta'])) {
        $ruta = filter_var($_GET['ruta'], FILTER_SANITIZE_URL);
        $auxiliar = 'views/' . $ruta . '.php';

        if(file_exists($auxiliar)) {
            $pagina = $auxiliar;
        }
    }

    require_once('views/partials/header.php');
    require_once($pagina);
    require_once('views/partials/footer.php');

?>