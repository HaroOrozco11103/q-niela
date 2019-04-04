@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        <h1>Jornadas</h1>
        <table class="table table-hover">
          <caption>Jornadas de {{ session('apodo') }}</caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Creado</th>
              <th scope="col">Actualizado</th>
            </tr>
          </thead>
          <tbody>
             @foreach($qniela as $jornada)
            <tr>
              <td>{{ $jornada->id }}</td>
              <td>{{ $jornada->nombre }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
