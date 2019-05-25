@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
    <div class="card-header">Jornadas
        @if(\Auth::user()->tipo == "admin")
        <a class="btn btn-outline-info bg-white" style="float:right;" href="{{ route('jornadas.create') }}">Agregar
            jornada</a>
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
            </tbody>
        </table>
    </div>
</div>
@endsection
