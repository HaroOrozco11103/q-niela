@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        <div class="card">
          <h1>Partidos</h1>

          <form method="POST">
            <input type="hidden" name="_method" value="PATCH">
            @csrf

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Número de jornada</th>
                <th scope="col">Local</th>
                <th scope="col">Visitante</th>
                <th scope="col">Resultado</th>
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
                    <td>
                      <input type="number" class="form-control" name="resL" value="{{ $par->resL ?? '' }}" min="0" max="25"> - <input type="number" class="form-control" name="resV" value="{{ $par->resV ?? '' }}" min="0" max="25">
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
          </form>
        </div>
      </div>
    </div>
@endsection
