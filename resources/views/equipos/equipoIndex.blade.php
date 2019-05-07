@extends('layouts.home-layout')

@section('content')
<div class="row justify-content-center" style="padding:50px;">
    <div class="col-12">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a style="color:black;" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Tabla de posiciones <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <br><br><br><br><br>

    @foreach($equipos as $eqp)
    @if(\Auth::user()->equipo_id == $eqp->id)
    <h1>Mi Equipo</h1>
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

    <br><br><br><br><br><br><br><br><br><br>

    <h1>Partidos</h1>
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
</div>
@endsection
