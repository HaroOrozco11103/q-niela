@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Cambiar contraseña</div>

    <div class="card-body">
        @if(isset($user))
        <form method="POST" action="{{ route('users.updatePass', $user->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
        @else
            <a class="btn-outline-info bg-white" href="{{ route('users.create') }}">Registrar</a>
        @endif

        @if(\Auth::user()->tipo == "comun")
            <div class="form-group row">
                <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña anterior') }}</label>
                <div class="col-md-6">
                    <input id="oldPassword" type="password" class="form-control" name="oldPassword">
                    @include('partials.formErrors')
                </div>
            </div>
        @endif

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña nueva') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar nueva contraseña') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-primary">Aceptar nueva contraseña</button>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection
