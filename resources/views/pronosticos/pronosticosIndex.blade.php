@extends('layouts.home-layout')

@section('content')

<div class="card shadow">
    <div class="card-header">Pronósticos de la Jornada:
        <a class="btn-outline-info bg-white" style="float:right;" href="{{ route('pronosticos.create') }}">Agregar pronóstico</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Jornada</th>
                    <th scope="col">Ver pronósticos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jornadas as $jor)
                <tr>
                    <td>{{ $jor->numero }}</td>
                    <td>
                        <a href="{{ route('pronosticos.showJorn', $jor->id) }}" class="btn-outline-info bg-white">
                          Pronósticos de esta jornada</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
