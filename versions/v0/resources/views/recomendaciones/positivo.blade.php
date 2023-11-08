@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>{{ __('app.titles.recomendaciones') }}</h1>
                <h5>{{ __('app.contents.recomendaciones') }}</h5>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-info" role="alert">
                <p><a href="#me" class="alert-link">{{ __('app.recomendaciones.goto') }} {{ __('app.recomendaciones.me') }}</a></p>
                <p class="mb-0"><a href="#them" class="alert-link">{{ __('app.recomendaciones.goto') }} {{ __('app.recomendaciones.them') }}</a></p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <h3 id="me">{{ __('app.recomendaciones.me') }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
            <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_evolucion.svg') }}" alt="{{ __('app.recomendaciones.titles.evolucion') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.evolucion') }}</h5>
                    <p class="card-text">{{ __('app.recomendaciones.sections.evolucion.one') }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-light mb-4">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_encasa.svg') }}" alt="{{ __('app.recomendaciones.titles.encasa') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.encasa') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.encasa.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.encasa.two') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
            <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_mascarilla.svg') }}" alt="{{ __('app.recomendaciones.titles.mascarilla') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.mascarilla') }}</h5>
                    <p class="card-text">{{ __('app.recomendaciones.sections.mascarilla.one') }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_seguridad.svg') }}" alt="{{ __('app.recomendaciones.titles.seguridad') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.seguridad') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.seguridad.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.seguridad.two') }}</li>
                        <li>{{ __('app.recomendaciones.sections.seguridad.three') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
            <div class="card bg-light mb-4">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_higiene.svg') }}" alt="{{ __('app.recomendaciones.titles.higiene') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.higiene') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.higiene.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.higiene.two') }}</li>
                        <li>{{ __('app.recomendaciones.sections.higiene.three') }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_incubacion.svg') }}" alt="{{ __('app.recomendaciones.titles.incubacion') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.incubacion') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.incubacion.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.incubacion.two') }}</li>
                        <li>{{ __('app.recomendaciones.sections.incubacion.three') }}</li>
                        <li>{{ __('app.recomendaciones.sections.incubacion.four') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
            <div class="card bg-light">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_entrevista.svg') }}" alt="{{ __('app.recomendaciones.titles.entrevista') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.entrevista') }}</h5>
                    <p class="card-text">{{ __('app.recomendaciones.sections.entrevista.one') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <h3 id="them">{{ __('app.recomendaciones.them') }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
         <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_seguridad.svg') }}" alt="{{ __('app.recomendaciones.titles.seguridad') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.seguridad') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.seguridad.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.seguridad.two') }}</li>
                        <li>{{ __('app.recomendaciones.sections.seguridad.three') }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-light mb-4">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_higiene.svg') }}" alt="{{ __('app.recomendaciones.titles.higiene') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.higiene') }}</h5>
                    <ul>
                        <li>{{ __('app.recomendaciones.sections.higiene.one') }}</li>
                        <li>{{ __('app.recomendaciones.sections.higiene.two') }}</li>
                        <li>{{ __('app.recomendaciones.sections.higiene.three') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-2 mb-3">
            <div class="card bg-light mb-3">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_transmision.svg') }}" alt="{{ __('app.recomendaciones.titles.transmision') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.transmision') }}</h5>
                    <p class="card-text">{{ __('app.recomendaciones.sections.transmision.one') }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-light">
                <div class="card-header text-center py-4">
                    <img src="{{ asset('res/svg/icon_entrevista.svg') }}" alt="{{ __('app.recomendaciones.titles.entrevista') }}" class="card-img-top card-image">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.recomendaciones.titles.entrevista') }}</h5>
                    <p class="card-text">{{ __('app.recomendaciones.sections.entrevista.one') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection