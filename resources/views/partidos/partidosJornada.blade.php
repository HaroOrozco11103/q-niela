@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        <div class="card">
          <h1>Partidos</h1>

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Número de jornada</th>
                <th scope="col">Local</th>
                <th scope="col">Visitante</th>
                <th scope="col">Resultado</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($partidos as $par)
                @if($jornada->id == $par->jornada_id)
                  <tr>
                    <td>{{ $par->id }}</td>
                    <td>
                      @foreach($jornadas as $jor)
                        {{ $par->jornada_id == $jor->id ? "$jor->numero" : '' }}
                      @endforeach
                    </td>
                    <td>
                      @foreach($equipos as $equipo)
                        {{ $par->equipo_local == $equipo->id ? "$equipo->nombre" : '' }}
                      @endforeach
                    </td>
                    <td>
                      @foreach($equipos as $equipo)
                        {{ $par->equipo_visitante == $equipo->id ? "$equipo->nombre" : '' }}
                      @endforeach
                    </td>
                    <td>{{ $par->resultado }}</td>
                    <td>
                      <a href="{{ route('partidos.show', $par->id) }}" class="btn btn-infobtn-sm">Opciones</a>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
@endsection
