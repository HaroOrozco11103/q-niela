@extends('layouts.home-layout')

@section('content')

<div class="card shadow">
    <div class="card-header">Partidos</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Número de<br>jornada</th>
                    <th scope="col">Local</th>
                    <th scope="col">Visitante</th>
                    <th scope="col">Resultado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partidos as $par)
                <div>
                    @if($jornada->id == $par->jornada_id)
                    <tr>
                        <td>{{ $par->id }}</td>
                        <td>
                            @foreach($jornadas as $jor)
                            {{ $par->jornada_id == $jor->id ? "$jor->numero" : '' }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($equipos as $equipo)
                            {{ $par->equipo_local == $equipo->id ? "$equipo->nombre" : '' }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($equipos as $equipo)
                            {{ $par->equipo_visitante == $equipo->id ? "$equipo->nombre" : '' }}
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('partidos.updateRes', $par->id, $par->jornada_id) }}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                @csrf
                                <input type="number" class="form-control" name="resL" value="{{ $par->resL ?? '' }}"
                                    min="0" max="25"> - <input type="number" class="form-control" name="resV"
                                    value="{{ $par->resV ?? '' }}" min="0" max="25">
                                <br>
                                <button type="submit" class="btn btn-outline-primary ml-auto">Aceptar</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
