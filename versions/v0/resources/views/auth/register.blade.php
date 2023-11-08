@extends('layouts.precovid')

@section('extra-libs')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('res/js/load_countries.js') }}"></script>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header"><strong>{{ __('app.titles.registro') }}</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="alert alert-info mb-4">
                            {{ __('app.titles.cuenta_existente') }} <a href="{{ route('login') }}" class="alert-link">{{ __('app.titles.login') }}</a>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.fecha_nacimiento') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.genero') }}</label>

                            <div class="col-md-6">
                                <select name="genero" id="genero" class="custom-select" required>
                                    <option value="" disabled selected>{{ __('app.fields.select.genero.selecciona') }}</option>
                                    <option value="f">{{ __('app.fields.select.genero.femenino') }}</option>
                                    <option value="m">{{ __('app.fields.select.genero.masculino') }}</option>
                                    <option value="o">{{ __('app.fields.select.genero.otro') }}</option>
                                    <option value="p">{{ __('app.fields.select.genero.nondisclosure') }}</option>
                                </select>

                                @error('genero')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.locacion') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="pais" id="pais" required>
                                    <option value="" disabled selected>{{ __('app.fields.select.pais.selecciona') }}</option>/option>
                                </select>

                                <input type="text" name="ciudad" id="ciudad" class="form-control mt-3 @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" placeholder="{{ __('app.fields.ciudad') }}" required>

                                @error('pais', 'ciudad')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.contrasena') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('app.fields.confirmar_contrasena') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="alert alert-info" role="alert">
                                    <div class="form-check">
                                        <input type="checkbox" name="terminos" id="terminos" class="form-check-input @error('terminos') is-invalid @enderror" value="1" required>

                                        <label for="terminos" class="form-check-label ml-2">
                                            {{ __('app.fields.disclaimer.part_one') }} <a href="{{ url('/terminos') }}" class="alert-link" target="_blank">{{ __('app.titles.terminos') }}</a>
                                            {{ __('app.fields.disclaimer.part_two') }} <a href="{{ url('/privacidad') }}" class="alert-link" target="_blank">{{ __('app.titles.privacidad') }}</a>
                                        </label>

                                        @error('terminos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('app.buttons.continuar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
