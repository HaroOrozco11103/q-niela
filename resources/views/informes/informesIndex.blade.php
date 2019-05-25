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
                          <th scope="col">Ver detalles</th>
                      </tr>
                  </thead>
                  <tbody>
                    @if(count($informes)==0)
                      <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                        Ya no existen informes.
                      </div>
                    @else
                      @foreach($informes as $inf)
                      <tr>
                          <td>{{ $inf->id }}</td>
                          <td>{{ $inf->nombre }}</td>
                          <td>{{ $inf->email }}</td>
                          <td>{{ $inf->username }}</td>
                          <td>{{ $inf->informe }}</td>
                          <td>
                              <a href="{{ route('informes.show', $inf->id) }}" class="btn btn-sm btn-warning">Editar</a>
                          </td>
                      </tr>
                      @endforeach
                    @endif
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
