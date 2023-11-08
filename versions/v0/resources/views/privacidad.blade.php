@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="mb-0">{{ __('app.titles.privacidad') }}</h1>
                <h7 class="mt-0">{{ __('app.privacidad.header.version') }}</h7>
                <h5 class="mt-3">{{ __('app.privacidad.header.description') }}</h5>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row mb-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-info" role="alert">
                {!! __('app.privacidad.header.alert') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2" id="privacidad">

            <div class="card">
                <div class="card-header" id="privacidadOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('app.privacidad.sections.one.title') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="privacidadOne" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.one.content_one') }}</p>
                        <p>{{ __('app.privacidad.sections.one.content_two') }}</p>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_two') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_three') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_four') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_five') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_six') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_seven') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.one.lists.one.element_eight') }}
                            </li>
                        </ul>
                        <p class="mb-0">{{ __('app.privacidad.sections.one.content_three') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('app.privacidad.sections.two.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseTwo" aria-labelledby="privacidadTwo" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.two.content_one') }}</p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.two.lists.one.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.two.lists.one.element_two') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('app.privacidad.sections.three.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseThree" aria-labelledby="privacidadThree" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.three.content_one') }}</p>
                        <p>{{ __('app.privacidad.sections.three.content_two') }}</p>
                        <p>{{ __('app.privacidad.sections.three.content_three') }}</p>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_two') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_three') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_four') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_five') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_six') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.one.element_seven') }}
                            </li>
                        </ul>
                        <p>{{ __('app.privacidad.sections.three.content_four') }}</p>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.two.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.two.element_two') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.three.lists.two.element_three') }}
                            </li>
                        </ul>
                        <p>{{ __('app.privacidad.sections.three.content_five') }}</p>
                        <p>{{ __('app.privacidad.sections.three.content_six') }}</p>
                        <p class="mb-0">{{ __('app.privacidad.sections.three.content_seven') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{ __('app.privacidad.sections.four.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseFour" aria-labelledby="privacidadFour" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.four.content_one') }}</p>
                        <p class="mb-0">{{ __('app.privacidad.sections.four.content_two') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            {{ __('app.privacidad.sections.five.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseFive" aria-labelledby="privacidadFive" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.five.content_one') }}</p>
                        <p>{{ __('app.privacidad.sections.five.content_two') }}</p>
                        <p>{{ __('app.privacidad.sections.five.content_three') }}</p>
                        
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.five.lists.one.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.five.lists.one.element_two') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.five.lists.one.element_three') }}
                            </li>
                        </ul>

                        <p class="mb-0">{{ __('app.privacidad.sections.five.content_four') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            {{ __('app.privacidad.sections.six.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseSix" aria-labelledby="privacidadSix" data-parent="#privacidad">
                    <div class="card-body">
                        {{ __('app.privacidad.sections.six.content_one') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadSeven">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            {{ __('app.privacidad.sections.seven.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseSeven" aria-labelledby="privacidadSeven" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.seven.content_one') }}</p>
                        <p class="mb-0">{{ __('app.privacidad.sections.seven.content_two') }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadEight">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            {{ __('app.privacidad.sections.eight.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseEight" aria-labelledby="privacidadEight" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.eight.content_one') }}</p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.eight.lists.one.element_one') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.eight.lists.one.element_two') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-caret-right text-info mx-2"></i>
                                {{ __('app.privacidad.sections.eight.lists.one.element_three') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="privacidadNine">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            {{ __('app.privacidad.sections.nine.title') }}
                        </button>
                    </h5>
                </div>
                <div class="collapse" id="collapseNine" aria-labelledby="privacidadNine" data-parent="#privacidad">
                    <div class="card-body">
                        <p>{{ __('app.privacidad.sections.nine.content_one') }}</p>
                        <p class="mb-0">{{ __('app.privacidad.sections.nine.content_two') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection