@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Equipos
        <a class="btn btn-outline-info bg-white" style="float:right;" href="{{ route('equipos.create') }}">Agregar equipo</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Partidos<br>ganados</th>
                    <th scope="col">Partidos<br>perdidos</th>
                    <th scope="col">Partidos<br>empatados</th>
                    <th scope="col">Goles<br>a favor</th>
                    <th scope="col">Goles<br>en contra</th>
                    <th scope="col">Diferencia<br>de goles</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Opciones</th>
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
                    <td>
                        <a href="{{ route('equipos.show', $eqp->id) }}" class="btn-outline-info bg-white">Opciones</a>
                    </td>
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
