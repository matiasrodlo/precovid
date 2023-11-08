@extends('layouts.precovid')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2>{{ __('app.titles.faq') }}</h2>
                <h5>{{ __('app.contents.faq') }}</h5>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2" id="faq">
            <div class="card">
                <div class="card-header" id="faqOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('app.faq.question.one') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="faqOne" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.one') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('app.faq.question.two') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="faqTwo" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.two') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('app.faq.question.three') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="faqThree" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.three') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{ __('app.faq.question.four') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="faqFour" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.four') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            {{ __('app.faq.question.five') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="faqFive" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.five') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            {{ __('app.faq.question.six') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="faqSix" data-parent="#faq">
                    <div class="card-body">
                        {{ __('app.faq.response.six') }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqSeven">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            {{ __('app.faq.question.seven') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="faqSeven" data-parent="#faq">
                    <div class="card-body">
                        <p>{{ __('app.faq.response.seven') }}</p>
                        <p class="mb-0"><strong>GEOEDUCA:</strong> Javiera Gonzalez, Valentina Cáceres, Francisco Concha, Francisco Vergara. <strong>CONMAPAS:</strong> Jorge Ulloa, Salvador Muñoz, Gino Escobar. <strong>UAI STARTUP SCHOOL:</strong> Alfredo Osorio, Matías Donoso, Raimundo Valdivia. <strong>OTROS COLABORADORES:</strong> Matías Rodlo, Claudio Moreno, Alberto Roa, Iván González, Matías Lobos, Paula Mardones, Carla Mardones, Leonardo Ramos, Matías Quinteros, Kurt Müller, Dino Cisterna, Daniela Bustos, Javiera Rosales, Evelyn Neira, Cristian Gonzalez, Daniela Bustos, Matías Naranjo, Eric Von Appen...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
