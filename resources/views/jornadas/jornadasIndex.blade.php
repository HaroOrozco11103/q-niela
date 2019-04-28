@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        <div class="card">
          <h1>Jornadas</h1>

          <table class="table table-hover">
            <caption>Jornadas de {{ Auth::user()->nombre }}</caption>
            <thead class="thead-dark">
              <tr>
                <th scope="col">Número de jornada</th>
                <th scope="col">Fecha en que inicia</th>
                <th scope="col">Fecha en que termina</th>
                <th scope="col">Partidos</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
               @foreach($jornadas as $jor)
              <tr>
                <td>{{ $jor->numero }}</td>
                <td>{{ $jor->inicio }}</td>
                <td>{{ $jor->fin }}</td>
                <td>
                  <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn btn-infobtn-sm">Partidos J{{$jor->id}}</a>
                </td>
                <td>
                  <a href="{{ route('jornadas.show', $jor->id) }}" class="btn btn-infobtn-sm">Opciones</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
@endsection
