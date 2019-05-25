@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Opciones de jornada</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Número de jornada</th>
                    <th scope="col">Fecha en que inicia</th>
                    <th scope="col">Fecha en que termina</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $jornada->id }}</td>
                    <td>{{ $jornada->numero }}</td>
                    <td>{{ $jornada->inicio->format('d/m/Y') }}</td>
                    <td>{{ $jornada->fin->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('jornadas.edit', $jornada->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('jornadas.destroy', $jornada->id) }}" method="POST">
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
