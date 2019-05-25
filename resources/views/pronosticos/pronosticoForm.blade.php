@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Agregar pronóstico</div>
    <div class="card-body">
        @include('partials.formErrors')

        @if(isset($pronostico))
        <form method="POST" action="{{ route('pronosticos.update', $pronostico->id) }}">
            <input type="hidden" name="_method" value="PATCH">
        @else
            <form method="POST" action="{{ route('pronosticos.store') }}">
        @endif
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Jornada</label>
                    <div class="col-md-6">
                        <select name="jornada_id" class="form-control">
                            @if($jornada->id != null)
                            <option value="{{ $jornada->id }}" {{ $jornada->id != null ? 'selected' : '' }}>
                                {{ $jornada->numero }}</option>
                            @else
                              @foreach($jornadas as $jornada)
                              <option value="{{ $jornada->id }}"
                                  {{ isset($pronostico) && $pronostico->jornada_id == $jornada->id ? 'selected' : '' }}>
                                  {{ $jornada->numero }}</option>
                              @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Apodo</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="apodo" value="{{ $pronostico->apodo ?? '' }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Usuario</label>
                    <div class="col-md-6">
                        <select name="user_id" class="form-control">
                            <option value=>0 - Ninguno</option>
                            @foreach($users as $usr)
                              <option value="{{ $usr->id }}"
                                  {{ isset($pronostico) && $pronostico->user_id == $usr->id ? 'selected' : '' }}>
                                  {{ $usr->id }} - {{ $usr->nombre }} - {{ $usr->username }} - {{ $usr->email }}
                              </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Partidos</label>
                    <div class="col-md-6">
                        //Tabla con partidos de la jornada
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Aceptar Pronóstico
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
