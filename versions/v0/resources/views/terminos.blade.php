@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2>{{ __('app.titles.terminos') }}</h2>
                <h5>{{ __('app.contents.terminos') }} </h5>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2" id="terminos">

            <div class="card">
                <div class="card-header" id="terminosOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('app.terminos.sections.one.title') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="terminosOne" data-parent="#terminos">
                    <div class="card-body">
                        <p>{{ __('app.terminos.sections.one.content_one') }}</p>
                        <div class="alert alert-info mb-0">{!! __('app.terminos.sections.one.content_two') !!}</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosTwo">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{ __('app.terminos.sections.two.title') }}
                    </button>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="terminosTwo" data-parent="#terminos">
                    <div class="card-body">
                        <p>{{ __('app.terminos.sections.two.content_one') }}</p>
                        <p>{{ __('app.terminos.sections.two.content_two') }}</p>
                        <div class="alert alert-info my-3">{!! __('app.terminos.sections.two.content_three') !!}</div>
                        <p class="mb-0">{{ __('app.terminos.sections.two.content_four') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosThree">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{ __('app.terminos.sections.three.title') }}
                    </button>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="terminosThree" data-parent="#terminos">
                    <div class="card-body">
                        {{ __('app.terminos.sections.three.content_one') }} <a href="{{ url('/privacidad') }}">{{ __('app.titles.privacidad') }}</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosFour">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        {{ __('app.terminos.sections.four.title') }}
                    </button>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="terminosFour" data-parent="#terminos">
                    <div class="card-body">
                        <p>{{ __('app.terminos.sections.four.content_one') }}</p>
                        <p>{{ __('app.terminos.sections.four.content_two') }}</p>
                        <p>{{ __('app.terminos.sections.four.content_three') }}</p>
                        <p class="mb-0">{{ __('app.terminos.sections.four.content_four') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosFive">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        {{ __('app.terminos.sections.five.title') }}
                    </button>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="terminosFive" data-parent="#terminos">
                    <div class="card-body">{{ __('app.terminos.sections.five.content_one') }}</div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosSix">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        {{ __('app.terminos.sections.six.title') }}
                    </button>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="terminosSix" data-parent="#terminos">
                    <div class="card-body">
                        <p>{{ __('app.terminos.sections.six.content_one') }}</p>
                        <p>{{ __('app.terminos.sections.six.content_two') }}</p>
                        <p class="mb-0">{{ __('app.terminos.sections.six.content_three') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="terminosSeven">
                    <button class="btn btn-link text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        {{ __('app.terminos.sections.seven.title') }}
                    </button>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="terminosSeven" data-parent="#terminos">
                    <div class="card-body">
                        <p>{{ __('app.terminos.sections.seven.content_one') }}</p>
                        <p class="mb-0">{{ __('app.terminos.sections.seven.content_two') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection