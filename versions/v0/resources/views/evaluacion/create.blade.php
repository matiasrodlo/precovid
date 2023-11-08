@extends('layouts.precovid')

@section('content')
<div class="container my-5">
    <form action="{{ route('evaluacion') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('app.titles.evaluacion') }}</strong>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.falta_aire') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="falta_aire" id="falta_aire" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="falta_aire" id="falta_aire" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.fiebre') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="fiebre" id="fiebre" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="fiebre" id="fiebre" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.tos') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="tos" id="tos" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="tos" id="tos" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.contacto') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="contacto" id="contacto" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="contacto" id="contacto" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.mucosidad') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="mucosidad" id="mucosidad" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="mucosidad" id="mucosidad" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.dolor_muscular') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="dolor_muscular" id="dolor_muscular" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="dolor_muscular" id="dolor_muscular" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.gastrointestinal') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="gastrointestinal" id="gastrointestinal" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="gastrointestinal" id="gastrointestinal" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <p class="card-text">{{ __('app.evaluacion.questions.varios_dias') }}</p>

                                <label class="clickthemall mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="varios_dias" id="varios_dias" value="1" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.yes') }}</span>
                                    </div>
                                </label>

                                <label class="clickthemall">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="varios_dias" id="varios_dias" value="0" required>
                                            </div>
                                        </div>

                                        <span class="input-group-text flex-fill">{{ __('app.evaluacion.responses.no') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col align-content-right">
                                <button type="submit" class="btn btn-primary mb-0" id="evaluacion" name="evaluacion">
                                    {{ __('app.buttons.continuar') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection