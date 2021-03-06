@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">{{ __('Agregar equipo') }}</div>
    <div class="card-body">

        @include('partials.formErrors')

        @if(isset($equipo))
        <form method="POST" action="{{ route('equipos.update', $equipo->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            @else
            <form method="POST" action="{{ route('equipos.store') }}">
                @endif
                @csrf

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nombre"
                            value="{{ $equipo->nombre ?? '' }}" placeholder="Nombre del equipo">
                        @if ($errors->has('nombre'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary ml-auto">Aceptar</button>
            </form>
    </div>

</div>
@endsection
