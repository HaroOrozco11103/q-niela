@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-sm-12">
        <div class="card">
          <h1>Opciones de Partido</h1>

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Número de jornada</th>
                <th scope="col">Local</th>
                <th scope="col">Visitante</th>
                <th scope="col">Resultado</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $partido->id }}</td>
                <td>
                  @foreach($jornadas as $jornada)
                    {{ $partido->jornada_id == $jornada->id ? "$jornada->numero" : '' }}
                  @endforeach
                </td>
                <td>
                  @foreach($equipos as $equipo)
                    {{ $partido->equipo_local == $equipo->id ? "$equipo->nombre" : '' }}
                  @endforeach
                </td>
                <td>
                  @foreach($equipos as $equipo)
                    {{ $partido->equipo_visitante == $equipo->id ? "$equipo->nombre" : '' }}
                  @endforeach
                </td>
                <td>{{ $partido->resultado }}</td>
                <td>
                  <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
                <td>
                  <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
@endsection
