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
                    <th scope="col">Partidos ganados</th>
                    <th scope="col">Partidos perdidos</th>
                    <th scope="col">Partidos empatados</th>
                    <th scope="col">Goles a favor</th>
                    <th scope="col">Goles en contra</th>
                    <th scope="col">Diferencia de goles</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
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
            </tbody>
        </table>
    </div>
</div>
@endsection
