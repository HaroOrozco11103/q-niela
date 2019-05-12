@extends('layouts.home-layout')

@section('content')
@auth
<script>
    window.location = "/bienvenida";

</script>
@else
<img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img mx-auto d-block mt-5">
<hr class="my-3">
<h2 class="text-center">
    Bienvenido a Q-niela. Esta es la página en la que podrás seguir los resultados de tus apuestas,
    además de los partidos de la liga MX. Crea tu cuenta para que empieces a disfrutar de la fácilidad
    de ver tus resultados en tu celular o computadora.

</h2>
@endauth
@endsection
