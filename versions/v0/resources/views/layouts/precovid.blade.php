<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Metadata -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ __('app.precovid.description') }}">

        <!-- Title -->
        <title>{{ config('app.name') }} &#8211; {{ __('app.precovid.title') }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('res/images/favicon-32.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('res/images/favicon-192.png') }}">

        <!-- Open Graph Protocol -->
        <meta name="og:title" content="{{ config('app.name') }} &#8211; {{ __('app.precovid.title') }}">
        <meta name="og:description" content="{{ __('app.precovid.description') }}">
        <meta name="og:type" content="website">
        <meta name="og:image" content="{{ asset('res/images/og_image.png') }}">
        <meta name="og:url" content="{{ url('/') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Stylesheets -->
        <link href="{{ asset('res/css/app.css') }}" rel="stylesheet">

        <!-- Javascripts -->
        <script type="text/javascript" src="{{ asset('res/js/app.js') }}" defer></script>
        <script type="text/javascript" src="https://kit.fontawesome.com/4db7d2b0f0.js" crossorigin="annonymous"></script>

        <!-- Google Analytics -->
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

        @yield('extra-libs')
    </head>
    <body>
    <div id="app">
        <!-- START: Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('res/images/logo_precovid.black.png') }}" alt="Precovid.org" width="100">
                </a>

                <!-- Toggler (for mobile devices) -->
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link @if (Route::is('faq')) active @endif">{{ __('app.titles.faq') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://wa.me/?text={{ __('app.contents.share_whatsapp') }}" class="nav-link" target="_blank">
                                {{ __('app.titles.share_whatsapp') }}
                            </a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navDropdown" href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledBy="navDropdown">
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('app.buttons.logout') }}
                                </a>

                                <form action="{{ route('logout') }}" method="POST" style="display:none;" id="logout-form">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item d-flex">
                            <!-- Social Media -->
                            <a href="https://twitter.com/precovid" class="nav-link" target="_blank">
                                <i class="fab fa-twitter mx-2"></i>
                            </a>
                            <a href="https://facebook.com/precovid" class="nav-link" target="_blank">
                                <i class="fab fa-facebook mx-2"></i>
                            </a>
                            <a href="https://instagram.com/precovid19" class="nav-link" target="_blank">
                                <i class="fab fa-instagram mx-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END: Navbar -->
        <!-- START: Content -->
        <main>
            @yield('content')
        </main>
        <!-- END: Content -->
    </div>
    </body>
</html>
