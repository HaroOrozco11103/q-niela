@extends('layouts.home-layout')

@section('content')
    <div class="row" style="padding:50px;">
      <div class="col-md-6 offset-3">
        <h1>Usuario</h1>

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Nombre de usuario</th>
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
                    {{ $usr->equipo_id == $equipo->id ? "$usr->equipo_id - $equipo->nombre" : '' }}
                  @endforeach
                </td>
                <td>{{ $usr->tipo }}</td>
                <td>
                  <a href="{{ route('users.show', $usr->id) }}" class="btn btn-infobtn-sm">Opciones</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

      </div>
    </div>
@endsection
