@extends('layouts.home-layout')

@section('content')

<div class="card shadow">
    <div class="card-header">Partidos de la Jornada:
        <a class="btn-outline-info bg-white" style="float:right;" href="{{ route('partidos.create') }}">Agregar partido</a>
    </div>
    <div class="table-responsive">
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
                        <a href="{{ route('partidos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">Partidos
                            de esta jornada</a>
                    </td>
                    <td>
                        <a href="{{ route('partidos.editRes', $jor->id) }}" class="btn-outline-info bg-white">Cambiar
                            resultados</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
