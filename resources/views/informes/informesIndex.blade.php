@extends('layouts.home-layout')

@section('content')
  @auth
    @if(\Auth::user()->tipo == "admin")
      <div class="card shadow">
          <div class="card-header">Informes de usuarios
          </div>
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Correo<br>electrónico</th>
                          <th scope="col">Nombre<br>de usuario</th>
                          <th scope="col">Informe</th>
                          <th scope="col">Borrar</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($informes as $inf)
                      <tr>
                          <td>{{ $inf->id }}</td>
                          <td>{{ $inf->nombre }}</td>
                          <td>{{ $inf->email }}</td>
                          <td>{{ $inf->username }}</td>
                          <td>{{ $inf->informe }}</td>
                          <td>
                            <form action="{{ route('informes.destroy', $inf->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              {{ $informes->links() }}
          </div>
      </div>
    @elseif(\Auth::user()->tipo == "comun")
      <script> window.location = "/informes/create"; </script>
    @endif
  @else
    <script> window.location = "/informes/create"; </script>
  @endauth
@endsection
