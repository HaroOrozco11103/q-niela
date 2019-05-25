@extends('layouts.home-layout')

@section('content')
<nav class="navbar navbar-light">
    <div class="card">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Tabla de posiciones <span class="caret"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Partidos<br>ganados</th>
                                    <th scope="col">Partidos<br>perdidos</th>
                                    <th scope="col">Partidos<br>empatados</th>
                                    <th scope="col">Goles<br>a favor</th>
                                    <th scope="col">Goles<br>en contra</th>
                                    <th scope="col">Diferencia<br>de goles</th>
                                    <th scope="col">Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(count($equipos)==0)
                                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                                  Aún no existen equipos añadidos.
                                </div>
                              @else
                                @foreach($equipos as $eqp)
                                <tr>
                                    <td>{{ $eqp->nombre }}</td>
                                    <td>{{ $eqp->gana }}</td>
                                    <td>{{ $eqp->pierde }}</td>
                                    <td>{{ $eqp->empata }}</td>
                                    <td>{{ $eqp->golFavor }}</td>
                                    <td>{{ $eqp->golContra }}</td>
                                    <td>{{ $eqp->difGoles }}</td>
                                    <td>{{ $eqp->puntos }}</td>
                                </tr>
                                @endforeach
                              @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<br><br><br>

@foreach($equipos as $eqp)
@if(\Auth::user()->equipo_id == $eqp->id)
<div class="card-header">Mi Equipo</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Partidos ganados</th>
                <th scope="col">Partidos perdidos</th>
                <th scope="col">Partidos empatados</th>
                <th scope="col">Goles a favor</th>
                <th scope="col">Goles en contra</th>
                <th scope="col">Diferencia de goles</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $eqp->nombre }}</td>
                <td>{{ $eqp->gana }}</td>
                <td>{{ $eqp->pierde }}</td>
                <td>{{ $eqp->empata }}</td>
                <td>{{ $eqp->golFavor }}</td>
                <td>{{ $eqp->golContra }}</td>
                <td>{{ $eqp->difGoles }}</td>
                <td>{{ $eqp->puntos }}</td>
            </tr>
        </tbody>
    </table>
</div>

<br><br><br><br>

<div class="card-header">Partidos</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Número de jornada</th>
                <th scope="col">Local</th>
                <th scope="col"></th>
                <th scope="col">Visitante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partidos as $par)
            @if($par->equipo_local == $eqp->id or $par->equipo_visitante == $eqp->id)
            <tr>
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
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endforeach
@endsection
