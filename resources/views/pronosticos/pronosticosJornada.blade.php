@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Pronósticos
      @auth
        @if(\Auth::user()->tipo == "admin")
          <a class="btn btn-outline-info bg-white" style="float:right;" href="{{ route('pronosticos.createProJorX', $jornada->id) }}">
            Agregar pronóstico
          </a>
        @endif
      @endauth
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    //Datos del pronostico
                  @auth
                    @if(\Auth::user()->tipo == "admin")
                      <th scope="col">Opciones</th>
                    @endif
                  @endauth
                </tr>
            </thead>
            <tbody>
              @if(count($pronosticos)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  Aún no existen pronosticos añadidos.
                </div>
              @else
                @foreach($pronosticos as $pro)
                @if($jornada->id == $pro->jornada_id)
                <tr>
                    //Datos partidos
                  @auth
                    @if(\Auth::user()->tipo == "admin")
                    <td>
                        <a href="{{ route('pronosticos.show', $pro->id) }}" class="btn-outline-info bg-white">Opciones</a>
                    </td>
                    @endif
                  @endauth
                </tr>
                @endif
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
