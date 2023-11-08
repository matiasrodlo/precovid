@extends('layouts.precovid')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('app.titles.verificar_cuenta') }}</strong>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('app.verification.email_sent') }}
                        </div>
                    @endif

                    <p class="card-text">{{ __('app.verification.before') }}</p>
                    <p class="card-text">{{ __('app.verification.not_received') }}, 
                        <form action="{{ route('verification.resend') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('app.verification.another') }}</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
