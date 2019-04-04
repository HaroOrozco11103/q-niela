@extends('layouts.home-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo correo de verificación a sido enviado a tu correo electronico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revisa tu correo electronico para el correo de verificación.') }}
                    {{ __('Sí no has recibido el correo') }}, <a href="{{ route('verification.resend') }}">{{ __('da clic aquí para reenviarlo') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
