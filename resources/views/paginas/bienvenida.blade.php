@extends('layouts.home-layout')

@section('content')
<img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img mx-auto d-block mt-5">
<hr class="my-3">
<h2 class="text-center">
    ¡Bienvenido a Q-niela, {{ Auth::user()->nombre }}!. Empieza a navegar por la página, checa los últimos 
    resultados de tus apuestas y de los partidos de la liga MX.     
</h2>
@endsection
