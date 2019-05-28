@extends('layouts.home-layout')

@section('content')

<div class="card shadow">
    <div class="card-header">
      Pronósticos de la Jornada:
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jornada</th>
                    <th scope="col">Ver pronósticos</th>
                    @auth
                      @if(\Auth::user()->tipo == "admin")
                        <th scope="col">Crear pronóstico<br>en esta jornada</th>
                      @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
              @if(count($jornadas)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  Aún no existen pronosticos añadidos.
                </div>
              @else
                @foreach($jornadas as $jor)
                <tr>
                    <td>{{ $jor->numero }}</td>
                    <td>
                        <a href="{{ route('pronosticos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">
                          Pronósticos de esta jornada</a>
                    </td>
                    @auth
                      @if(\Auth::user()->tipo == "admin")
                        <td>
                            <a href="{{ route('pronosticos.createProJorX', $jor->id) }}" class="btn-outline-info bg-white">
                              Añadir pronóstico</a>
                        </td>
                      @endif
                    @endauth
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
