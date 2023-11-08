<!DOCTYPE html>
<html lang="es-CL">
    <head>
        <meta charset="UTF-8" />

        <title><?php echo TITULO; ?></title>

        <meta name="description" content="<?php echo DESCRIPCION; ?>" />
        <meta name="og:title" content="<?php echo TITULO; ?>" />
        <meta name="og:description" content="<?php echo DESCRIPCION; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RES_IMAGES . '/favicon-32.png'; ?>" />
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo RES_IMAGES . '/favicon-192.png'; ?>" />

        <link rel="stylesheet" type="text/css" href="<?php echo RES_STYLESHEETS . '/normalize.css'; ?>" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo RES_STYLESHEETS . '/precovid.css'; ?>" />

        <script src="https://kit.fontawesome.com/4db7d2b0f0.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162030180-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());  gtag('config', 'UA-162030180-1');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '797356830375044');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=797356830375044&ev=PageView&noscript=1"/></noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo RUTA; ?>">
                    <img src="<?php echo RES_IMAGES . '/LOGO-PRECOVID-NEGRO 2.png'; ?>" width="120" />
                </a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="<?php echo RUTA . '/faq'; ?>" class="nav-link">
                                Preguntas Frecuentes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://wa.me/?text=Me+he+realizado+una+autoevaluci%C3%B3n+del+COVID-19.+Te+invito+a+que+descubras+si+tienes+los+s%C3%ADntomas+en+www.precovid.org.+La+puedes+realizar+en+menos+de+3+minutos+y+sin+costo" class="nav-link" target="_blank">
                                Compartir vía WhatsApp
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="https://twitter.com/precovid" class="d-inline nav-link" target="_blank">
                                <i class="fab fa-twitter text-dark mx-2"></i>
                            </a>
                            <a href="https://facebook.com/precovid" class="d-inline nav-link" target="_blank">
                                <i class="fab fa-facebook text-dark mx-2"></i>
                            </a>
                            <a href="https://instagram.com/precovid19" class="d-inline nav-link" target="_blank">
                                <i class="fab fa-instagram text-dark mx-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>