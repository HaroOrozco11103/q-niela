@extends('layouts.home-layout')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar partido') }}</div>
                <div class="card-body">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  @if(isset($partido))
                    <form method="POST" action="{{ route('partidos.update', $partido->id) }}">
                      <input type="hidden" name="_method" value="PATCH">
                  @else
                    <form method="POST" action="{{ route('partidos.store') }}">
                  @endif
                      @csrf

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Jornada</label>
                          <div class="col-md-6">
                            <select name="jornada_id" class="form-control">
                              @foreach($jornadas as $jornada)
                                  <option value="{{ $jornada->id }}" {{ isset($partido) && $partido->jornada_id == $jornada->id ? 'selected' : '' }}>{{ $jornada->numero }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Local</label>
                          <div class="col-md-6">
                            <select name="equipo_local" class="form-control">
                              @foreach($equipos as $equipo)
                                 <option value="{{ $equipo->id }}" {{ isset($partido) && $partido->equipo_local == $equipo->id ? 'selected' : '' }}>{{ $equipo->id }} - {{ $equipo->nombre }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Visitante</label>
                          <div class="col-md-6">
                            <select name="equipo_visitante" class="form-control">
                            @foreach($equipos as $equipo)
                               <option value="{{ $equipo->id }}" {{ isset($partido) && $partido->equipo_visitante == $equipo->id ? 'selected' : '' }}>{{ $equipo->id }} - {{ $equipo->nombre }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Marcador</label>
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="resL" value="{{ $partido->resL ?? '' }}" min="0" max="25"> - <input type="number" class="form-control" name="resV" value="{{ $partido->resV ?? '' }}" min="0" max="25">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Aceptar Partido') }}
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
