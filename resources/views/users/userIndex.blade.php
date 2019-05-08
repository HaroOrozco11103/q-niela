@extends('layouts.home-layout')

@section('content')
    <div class="row" style="padding:50px;">
      <div class="col-md-6 offset-3">
        <h1>Mi perfil</h1>

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo<br>electrónico</th>
                <th scope="col">Nombre<br>de usuario</th>
                <th scope="col">Equipo</th>
                <th scope="col">Modificar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>
                  @foreach($equipos as $equipo)
                    {{ $user->equipo_id == $equipo->id ? "$equipo->nombre" : '' }}
                  @endforeach
                </td>
                <th>
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </th>
              </tr>
            </tbody>
          </table>

      </div>
    </div>
@endsection
