@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Jornadas
        @if(\Auth::user()->tipo == "admin")
          <a class="btn btn-outline-info bg-white" style="float:right;" href="{{ route('jornadas.create') }}">
            Agregar jornada
          </a>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Número de<br>jornada</th>
                    <th scope="col">Fecha en<br>que inicia</th>
                    <th scope="col">Fecha en<br>que termina</th>
                    <th scope="col">Partidos</th>
                    <th scope="col">Pronosticos</th>
                    @if(\Auth::user()->tipo == "admin")
                    <th scope="col">Opciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
              @if(count($jornadas)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  Aún no existen jornadas añadidas.
                </div>
              @else
                @foreach($jornadas as $jor)
                <tr>
                    <td>{{ $jor->numero }}</td>
                    <td>{{ $jor->inicio->format('d/m/Y') }}</td>
                    <td>{{ $jor->fin->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">
                          Partidos J{{ $jor->numero }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('pronosticos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">
                          Pronosticos J{{ $jor->numero }}
                        </a>
                    </td>
                    <td>
                        @if(\Auth::user()->tipo == "admin")
                        <a href="{{ route('jornadas.show', $jor->id) }}" class="btn-outline-info bg-white">Opciones</a>
                        @endif
                    </td>
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
</div>



<nav class="navbar navbar-light">
    <div class="card">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Jornadas Terminadas <span class="caret"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="table-responsive">
                      <table class="table table-hover">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">Número de<br>jornada</th>
                                  <th scope="col">Fecha en<br>que inicia</th>
                                  <th scope="col">Fecha en<br>que termina</th>
                                  <th scope="col">Partidos</th>
                                  <th scope="col">Pronosticos</th>
                                  @if(\Auth::user()->tipo == "admin")
                                  <th scope="col">Opciones</th>
                                  @endif
                              </tr>
                          </thead>
                          <tbody>
                            @if(count($jornadasFin)==0)
                              <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                                Aún no existen jornadas añadidas.
                              </div>
                            @else
                              @foreach($jornadasFin as $jors)
                              <tr>
                                  <td>{{ $jors->numero }}</td>
                                  <td>{{ $jors->inicio->format('d/m/Y') }}</td>
                                  <td>{{ $jors->fin->format('d/m/Y') }}</td>
                                  <td>
                                      <a href="{{ route('partidos.showJorn', $jors->id) }}" class="btn-outline-info bg-white">
                                        Partidos J{{ $jors->numero }}
                                      </a>
                                  </td>
                                  <td>
                                      <a href="{{ route('pronosticos.showJorn', $jors->id) }}" class="btn-outline-info bg-white">
                                        Pronosticos J{{ $jors->numero }}
                                      </a>
                                  </td>
                                  <td>
                                      @if(\Auth::user()->tipo == "admin")
                                      <a href="{{ route('jornadas.show', $jors->id) }}" class="btn-outline-info bg-white">Opciones</a>
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                            @endif
                          </tbody>
                      </table>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
@endsection
