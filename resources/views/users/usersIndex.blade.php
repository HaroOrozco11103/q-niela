@extends('layouts.home-layout')

@section('content')
<div class="row justify-content-center" style="padding:50px;">
    <div class="col-12">
        <a class="btn btn-infobtn-sm" href="{{ route('users.create') }}">Agregar usuario</a>
        <h1>Usuarios</h1>
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo<br>electrónico</th>
                                    <th scope="col">Nombre<br>de usuario</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $usr)
                                <tr>
                                    <td>{{ $usr->nombre }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->username }}</td>
                                    <td>
                                        @foreach($equipos as $equipo)
                                        {{ $usr->equipo_id == $equipo->id ? "$equipo->nombre" : '' }}
                                        @endforeach
                                    </td>
                                    <td>{{ $usr->tipo }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $usr->id) }}"
                                            class="btn btn-infobtn-sm">Opciones</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
