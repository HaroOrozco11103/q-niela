@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        @if(\Auth::user()->tipo == "admin")
          <a class="btn btn-infobtn-sm" href="{{ route('jornadas.create') }}">Agregar jornada</a>
        @endif
        <h1>Jornadas</h1>
        <div class="card">

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Número de jornada</th>
                <th scope="col">Fecha en que inicia</th>
                <th scope="col">Fecha en que termina</th>
                <th scope="col">Partidos</th>
                @if(\Auth::user()->tipo == "admin")
                  <th scope="col">Opciones</th>
                @elseif(\Auth::user()->tipo == "comun")
                  <th scope="col">Pronosticos</th>
                @endif
              </tr>
            </thead>
            <tbody>
               @foreach($jornadas as $jor)
              <tr>
                <td>{{ $jor->numero }}</td>
                <td>{{ $jor->inicio }}</td>
                <td>{{ $jor->fin }}</td>
                <td>
                  <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn btn-infobtn-sm">Partidos J{{$jor->numero}}</a>
                </td>
                <td>
                  @if(\Auth::user()->tipo == "admin")
                    <a href="{{ route('jornadas.show', $jor->id) }}" class="btn btn-infobtn-sm">Opciones</a>
                  @elseif(\Auth::user()->tipo == "comun")
                    <a href="" class="btn btn-infobtn-sm">Pronosticos de esta jornada</a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
@endsection
