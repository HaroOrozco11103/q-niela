@extends('layouts.home-layout')

@section('content')
    <div class="row justify-content-center" style="padding:50px;">
      <div class="col-8">
        <a class="btn btn-infobtn-sm" href="{{ route('partidos.create') }}">Agregar partido</a>
        <h1>Partidos de la Jornada:</h1>
        <div class="card">

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Jornada</th>
                <th scope="col">Ver partidos</th>
                <th scope="col">Modificar marcadores</th>
              </tr>
            </thead>
            <tbody>
               @foreach($jornadas as $jor)
              <tr>
                <td>{{ $jor->numero }}</td>
                <td>
                  <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn btn-infobtn-sm">Partidos de esta jornada</a>
                </td>
                <td>
                  <a href="{{ route('partidos.editRes', $jor->id) }}" class="btn btn-infobtn-sm">Cambiar resultados</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
@endsection
