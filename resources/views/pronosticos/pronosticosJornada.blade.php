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
                  <th scope="col">Jornada</th>
                  <th scope="col">Aciertos</th>
                  <th scope="col">Apodo</th>
                  <th scope="col">Usuario</th>
                  @foreach($partidos as $parAct)
                    @if($jornada->id == $parAct->jornada_id)
                      <th scope="col">
                        @foreach($equipos as $eqpAct)
                          {{ $parAct->equipo_local == $eqpAct->id ? "$eqpAct->nombre" : '' }}
                        @endforeach
                        <br>
                        @foreach($equipos as $eqpAct)
                          {{ $parAct->equipo_visitante == $eqpAct->id ? "$eqpAct->nombre" : '' }}
                        @endforeach
                      </th>
                    @endif
                  @endforeach
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
                      <td>
                        @foreach($jornadas as $jorAct)
                          {{ $pro->jornada_id == $jorAct->id ? "$jorAct->numero" : '' }}
                        @endforeach
                      </td>
                      <td>{{ $pro->totalAciertos }}</td>
                      <td>{{ $pro->apodo }}</td>
                      <td>
                        @foreach($users as $usrAct)
                          {{ $pro->user_id == $usrAct->id ? "$usrAct->username" : '' }}
                        @endforeach
                      </td>

                      @foreach($pro->partidos as $partidoAct)
                        <th scope="col">
                          {{ $partidoAct->prediccion }}
                        </th>
                      @endforeach

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
