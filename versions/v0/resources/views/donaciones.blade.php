@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>{{ __('app.titles.donations') }}</h1>
                <h5>{{ __('app.contents.donations') }}</h5>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-info">
                <p class="card-text">{{ __('app.donaciones.contents_one') }}</p>
                <p class="card-text mb-0">{{ __('app.donaciones.contents_two') }}</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3 offset-lg-2 mb-5">
            <div class="card bg-success text-white">
                <div class="card-header"><strong>{{ __('app.donaciones.titles.donacion') }}</strong></div>
                <div class="card-body text-center">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick" />
                        <input type="hidden" name="hosted_button_id" value="KFUKYGYYAVHYQ" />
                        <button type="submit" class="btn btn-light mb-2">{{ __('app.buttons.apoyar') }}</button>
                        <input type="image" src="{{ asset('res/images/icon_creditcards.gif') }}" title="{{ __('app.titles.apoyar') }}" alt="{{ __('app.contents.apoyar') }}">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card mb-5">
                <div class="card-header">
                    <strong>{{ __('app.donaciones.titles.proposito') }}</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ __('app.donaciones.contents_three') }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('app.donaciones.titles.solucion') }}</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ __('app.donaciones.contents_four') }}</p>
                    <p class="card-text mb-0">{{ __('app.donaciones.contents_five') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection