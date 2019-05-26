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
                      <div class="table-responsive">
                          <table class="table table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ID de<br>partido</th>
                                    <th scope="col">Local</th>
                                    <th scope="col"></th>
                                    <th scope="col">Visitante</th>
                                    <th scope="col">Predicción</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($partidos as $par)
                                    @if($jornada->id == $par->jornada_id)
                                      <tr>
                                        <td>
                                          <input type="text" class="form-control" name="partidos_id[]" value="{{ $par->id ?? '' }}" required multiple readonly>
                                        </td>
                                        <td>
                                          @foreach($equipos as $equipo)
                                            {{ $par->equipo_local == $equipo->id ? "$equipo->nombre" : '' }}
                                          @endforeach
                                        </td>
                                        <td>{{ $par->resL }} - {{ $par->resV }}</td>
                                        <td>
                                          @foreach($equipos as $equipo)
                                            {{ $par->equipo_visitante == $equipo->id ? "$equipo->nombre" : '' }}
                                          @endforeach
                                        </td>
                                        <td>
                                          <select name="prediccions[]" class="form-control">
                                              <option value = "G">G</option>
                                              <option value = "E">E</option>
                                              <option value = "P">P</option>
                                          </select>
                                        </td>
                                      </tr>
                                    @endif
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
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
