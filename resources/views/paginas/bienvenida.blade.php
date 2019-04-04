@extends('layouts.home-layout')

@section('content')
    <h1>Bienvenida</h1>
    <p>
      Hola {{ $nombre }} {{ $apellido }}
      <br> <br>
      Nombre completo: {{ $nombre_completo }}
    </p>
@endsection
