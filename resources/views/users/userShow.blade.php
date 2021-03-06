@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Opciones de Usuario</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Actualizado</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        @foreach($equipos as $equipo)
                        {{ $user->equipo_id == $equipo->id ? "$equipo->nombre" : '' }}
                        @endforeach
                    </td>
                    <td>{{ $user->tipo }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
