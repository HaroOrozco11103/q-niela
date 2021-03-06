@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Partidos
        @if(\Auth::user()->tipo == "admin")
        <a class="btn btn-outline-info bg-white" style="float:right;" href="{{ route('partidos.createParJorX', $jornada->id) }}">Agregar
            partido</a>
        @endif</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Número de<br>jornada</th>
                    <th scope="col">Local</th>
                    <th scope="col"></th>
                    <th scope="col">Visitante</th>
                    @if(\Auth::user()->tipo == "admin")
                    <th scope="col">Opciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
              @if(count($partidos)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  Aún no existen partidos añadidos.
                </div>
              @else
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
                    <td>{{ $par->resL }} - {{ $par->resV }}</td>
                    <td>
                        @foreach($equipos as $equipo)
                        {{ $par->equipo_visitante == $equipo->id ? "$equipo->nombre" : '' }}
                        @endforeach
                    </td>
                    @if(\Auth::user()->tipo == "admin")
                    <td>
                        <a href="{{ route('partidos.show', $par->id) }}" class="btn-outline-info bg-white">Opciones</a>
                    </td>
                    @endif
                </tr>
                @endif
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
