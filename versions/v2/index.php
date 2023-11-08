<?php

    // Constants -------------------------------------------------------------------------------

    define('RUTA', 'https://www.precovid.cl');
    //define('RUTA', '//localhost/precovid2');
    define('RES_IMAGES', RUTA . '/res/images');
    define('RES_STYLESHEETS', RUTA . '/res/stylesheets');
    define('RES_JAVASCRIPTS', RUTA . '/res/javascripts');

    define('TITULO', 'Precovid &#8211; Haz tu autoevaluación del COVID-19');
    define('DESCRIPCION', 'Evalúa tu salud y recibe instrucciones y recomendaciones sobre el COVID-19.');

    // Attributes ------------------------------------------------------------------------------

    // Contenido por defecto
    $pagina = 'views/home.php';

    // Loading ---------------------------------------------------------------------------------

    // TODO: Sanitizar $_GET
    if(isset($_GET['ruta'])) {
        $auxiliar = 'views/' . $_GET['ruta'] . '.php';

        if(file_exists($auxiliar)) {
            $pagina = $auxiliar;
        }
    }

    require_once('views/partials/header.php');
    require_once($pagina);
    require_once('views/partials/footer.php');

?>