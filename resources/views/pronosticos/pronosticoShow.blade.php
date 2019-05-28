@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">
      Opciones de pronósticos
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th scope="col" class="bg-info">Jornada</th>
            <td class="table-info">
              @foreach($jornadas as $jorAct)
                {{ $pronostico->jornada_id == $jorAct->id ? "$jorAct->numero" : '' }}
              @endforeach
            </td>
          </tr>
          <tr>
            <th scope="col" class="bg-info">Aciertos</th>
            <td class="table-info">{{ $pronostico->totalAciertos }}</td>
          </tr>
          <tr>
            <th scope="col" class="bg-info">Apodo</th>
            <td class="table-info">{{ $pronostico->apodo }}</td>
          </tr>
          <tr>
            <th scope="col" class="bg-info">Usuario</th>
            <td class="table-info">
              @foreach($users as $usrAct)
                {{ $pronostico->user_id == $usrAct->id ? "$usrAct->username" : '' }}
              @endforeach
            </td>
          </tr>
          <tr>
            <th scope="col">
            </th>
            <td>
            </td>
          </tr>
          @foreach($pronostico->partidos as $partidoAct)
            <tr>
              <th scope="col" class="bg-success">
                @foreach($equipos as $eqpAct)
                  {{ $partidoAct->equipo_local == $eqpAct->id ? "$eqpAct->nombre" : '' }}
                @endforeach
                <br>
                @foreach($equipos as $eqpAct)
                  {{ $partidoAct->equipo_visitante == $eqpAct->id ? "$eqpAct->nombre" : '' }}
                @endforeach
              </th>
              <td class="table-success">
                predicción
              </td>
            </tr>
          @endforeach
          <tr>
            <th scope="col">
            </th>
            <td>
            </td>
          </tr>
          <tr>
            @auth
              @if(\Auth::user()->tipo == "admin")
                <th scope="col" class="bg-warning">Editar</th>
                <td class="table-warning">
                  <a href="{{ route('pronosticos.edit', $pronostico->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
              @endif
            @endauth
          </tr>
          <tr>
            @auth
              @if(\Auth::user()->tipo == "admin")
                <th scope="col" class="bg-danger">Eliminar</th>
                <td class="table-danger">
                  <form action="{{ route('pronosticos.destroy', $pronostico->id) }}" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </td>
              @endif
            @endauth
          </tr>
        </table>
    </div>
</div>
@endsection
