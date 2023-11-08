@extends('layouts.precovid')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-5 offset-lg-2 mb-5">
            <div class="card bg-warning text-dark">
                <div class="card-header"><strong>{{ __('app.titles.resultado') }}</strong></div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('app.resultados.title') }}</h5>
                    <p class="card-text">{{ __('app.resultados.positivo') }}</p>
                    <p class="card-text">{{ __('app.resultados.common') }}</p>
                    <p class="card-text mb-0">
                        <a href="{{ url('/recomendaciones/positivo') }}" class="btn btn-light w-100">{{ __('app.buttons.recomendaciones') }}</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-light">
                <div class="card-header"><strong>{{ __('app.titles.share_whatsapp') }}</strong></div>

                <div class="card-body">
                    <p class="card-text">{{ __('app.resultados.comparte') }}</p>
                    <p class="card-text mb-0">
                        <a href="https://wa.me/?text={{ __('app.contents.share_whatsapp') }}" class="btn btn-primary w-100" target="_blank">{{ __('app.buttons.compartir') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection