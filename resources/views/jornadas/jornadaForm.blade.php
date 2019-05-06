@extends('layouts.home-layout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar jornada') }}</div>

                <div class="card-body">
                  @include('partials.formErrors)

                  @if(isset($jornada))
                    <form method="POST" action="{{ route('jornadas.update', $jornada->id) }}">
                      <input type="hidden" name="_method" value="PATCH">
                  @else
                    <form method="POST" action="{{ route('jornadas.store') }}">
                  @endif
                      @csrf

                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Número</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="numero" value="{{ $jornada->numero ?? '' }}{{ old('numero') }}" placeholder="Número de jornada">
                          @if ($errors->has('numero'))
                            <span class="alert alert-danger">
                              <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Inicio</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control" name="inicio" value="{{ isset($jornada) ? $jornada->inicio : '' }}{{ old('inicio') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Final</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control" name="fin" value="{{ isset($jornada) ? $jornada->fin : '' }}{{ old('fin') }}">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
