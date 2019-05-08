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
                    <th scope="col">Número de jornada</th>
                    <th scope="col">Fecha en que inicia</th>
                    <th scope="col">Fecha en que termina</th>
                    <th scope="col">Partidos</th>
                    @if(\Auth::user()->tipo == "admin")
                    <th scope="col">Opciones</th>
                    @elseif(\Auth::user()->tipo == "comun")
                    <th scope="col">Pronosticos</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($jornadas as $jor)
                <tr>
                    <td>{{ $jor->numero }}</td>
                    <td>{{ $jor->inicio }}</td>
                    <td>{{ $jor->fin }}</td>
                    <td>
                        <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">Partidos
                            J{{$jor->numero}}</a>
                    </td>
                    <td>
                        @if(\Auth::user()->tipo == "admin")
                        <a href="{{ route('jornadas.show', $jor->id) }}" class="btn-outline-info bg-white">Opciones</a>
                        @elseif(\Auth::user()->tipo == "comun")
                        <a href="" class="btn-outline-info bg-white">Pronosticos de esta jornada</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
