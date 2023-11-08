@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1>{{ __('app.index.titles.autoevaluacion') }}</h1>
        <h5>{{ __('app.index.contents.autoevaluacion') }}</h5>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 text-center">
            <div class="alert alert-primary" role="alert">
                {!! __('app.index.titles.sintomas') !!}
            </div>
            @auth
            <a href="{{ url('evaluacion') }}" class="btn btn-primary">
                {{ __('app.index.contents.entendido') }}
            </a>
            @endauth
            @guest
            <a href="{{ url('register') }}" class="btn btn-primary">
                {{ __('app.index.contents.entendido') }}
            </a>
            @endguest
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md text-center">
            <img src="{{ asset('res/svg/icon_data.svg') }}" alt="{{ __('app.index.titles.datos') }}" width="90">
            <h3>{{ __('app.index.titles.datos') }}</h3>
            <p>{{ __('app.index.contents.datos') }}</p>
        </div>
        <div class="col-md text-center">
            <img src="{{ asset('res/svg/icon_evaluation.svg') }}" alt="{{ __('app.index.titles.evaluacion') }}" width="90">
            <h3>{{ __('app.index.titles.evaluacion') }}</h3>
            <p>{{ __('app.index.contents.evaluacion') }}</p>
        </div>
        <div class="col-md text-center">
            <img src="{{ asset('res/svg/icon_notification.svg') }}" alt="{{ __('app.index.titles.instrucciones') }}" width="90">
            <h3>{{ __('app.index.titles.instrucciones') }}</h3>
            <p>{{ __('app.index.contents.instrucciones') }}</p>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col text-center">
            {{ __('app.index.footer') }}
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg col-lg-auto text-center">
            <a href="{{ url('/terminos') }}">{{ __('app.titles.terminos') }}</a>
        </div>
        <div class="col-lg col-lg-auto text-center">
            <a href="{{ url('/privacidad') }}">{{ __('app.titles.privacidad') }}</a>
        </div>
    </div>
</div>
@endsection