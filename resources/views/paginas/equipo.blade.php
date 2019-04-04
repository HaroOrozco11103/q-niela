@extends('layouts.home-layout')

@section('content')
<div class="col-8 offset-2">
<!-- <div class="col-md-8 offset-2">  -->
<!-- <table class="table table-hover table-responsive"> -->
<table class="table table-hover">
  <caption>Miembros del equipo</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cod</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombres</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">216790052</th>
      <td>Orozco</td>
      <td>Haro</td>
    </tr>
    <tr>
      <th scope="row">123456789</th>
      <td>Ayala Bernal</td>
      <td>Lupita</td>
    </tr>
  </tbody>
</table>
</div>
@endsection
