@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Opciones de equipos</div>
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
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->gana }}</td>
                    <td>{{ $equipo->pierde }}</td>
                    <td>{{ $equipo->empata }}</td>
                    <td>{{ $equipo->golFavor }}</td>
                    <td>{{ $equipo->golContra }}</td>
                    <td>{{ $equipo->difGoles }}</td>
                    <td>{{ $equipo->puntos }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">
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
@endsection
