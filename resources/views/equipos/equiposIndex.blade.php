@extends('layouts.home-layout')

@section('content')
<div class="row justify-content-center" style="padding:50px;">
    <div class="col-12">
        <a class="btn btn-infobtn-sm" href="{{ route('equipos.create') }}">Agregar equipo</a>
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-white mb-0">Equipos</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Partidos ganados</th>
                                    <th scope="col">Partidos perdidos</th>
                                    <th scope="col">Partidos empatados</th>
                                    <th scope="col">Goles a favor</th>
                                    <th scope="col">Goles en contra</th>
                                    <th scope="col">Diferencia de goles</th>
                                    <th scope="col">Puntos</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                                @foreach($equipos as $eqp)
                                <tr>
                                    <td>{{ $eqp->nombre }}</td>
                                    <td>{{ $eqp->gana }}</td>
                                    <td>{{ $eqp->pierde }}</td>
                                    <td>{{ $eqp->empata }}</td>
                                    <td>{{ $eqp->golFavor }}</td>
                                    <td>{{ $eqp->golContra }}</td>
                                    <td>{{ $eqp->difGoles }}</td>
                                    <td>{{ $eqp->puntos }}</td>
                                    <td>
                                        <a href="{{ route('equipos.show', $eqp->id) }}"
                                            class="btn btn-infobtn-sm">Opciones</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
