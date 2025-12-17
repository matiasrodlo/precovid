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
        
        <!-- Bootstrap JS (required for tooltips) -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="<?php echo RES_JAVASCRIPTS . '/form-validation.js'; ?>"></script>



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

