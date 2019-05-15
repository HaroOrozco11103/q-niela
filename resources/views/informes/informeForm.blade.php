@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
  @guest
    <div class="card-header">Enviar Informe
      <hr class="my-3">
        Para enviar un informe es necesario que llene el campo de nombre y el de informe. Los campos de email y
        username son opcionales. Puede enviar un informe para reportar un problema en el sistema, recuperar su
        contraseña, o enviar alguna sugerencia al administrador.
    </div>
    <div class="card-body">
      @include('partials.formErrors')
      <form method="POST" action="{{ route('informes.store') }}">
        @csrf
        <div class="form-group">
          <label for="inputName">Nombre</label>
          <input type="nombre" class="form-control" name="inputName" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="inputEmail">Correo Electronico</label>
          <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
              placeholder="Correo Electronico">
        </div>
        <div class="form-group">
          <label for="inputUsername">Nombre de Usuario</label>
          <input type="username" class="form-control" name="inputUsername" placeholder="Nombre de Usuario">
        </div>
        <div class="form-group">
          <label for="formInforme">Informar</label>
          <textarea class="form-control" name="formInforme" rows="5">{{ $informe->informe ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-info bg-white">Enviar informe</button>
      </form>
    </div>
  @else
      @if(\Auth::user()->tipo == "comun")
        <div class="card-header">Enviar Informe
            <hr class="my-3">
            Para enviar un informe es necesario que llene el campo de nombre y el de informe. Los campos de email y
            username son opcionales. Puede enviar un informe para reportar un problema en el sistema, recuperar su
            contraseña, o enviar alguna sugerencia al administrador.
        </div>
      @endif
        <div class="card-body">
          @if(\Auth::user()->tipo == "comun")
            @include('partials.formErrors')

            <form method="POST" action="{{ route('informes.store') }}">
                @csrf
          @elseif(\Auth::user()->tipo == "admin")
            <form action="{{ route('informes.destroy', $informe->id) }}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              @csrf
          @endif

          @if(\Auth::user()->tipo == "admin")
                <div class="form-group">
                    <label for="inputName">Nombre</label>
                    <input type="nombre" class="form-control" name="inputName" value="{{ $informe->nombre ?? '' }}"
                        placeholder="Nombre" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Correo Electronico</label>
                    <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
                        value="{{ $informe->email ?? '' }}" placeholder="Correo Electronico" disabled>
                </div>
                <div class="form-group">
                    <label for="inputUsername">Nombre de Usuario</label>
                    <input type="username" class="form-control" name="inputUsername"
                        value="{{ $informe->username ?? '' }}" placeholder="Nombre de Usuario" disabled>
                </div>
                <div class="form-group">
                    <label for="formInforme">Informar</label>
                    <textarea class="form-control" name="formInforme" rows="5" disabled>{{ $informe->informe ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-info bg-white">Eliminar informe</button>
            @elseif(\Auth::user()->tipo == "comun")
                <div class="form-group">
                    <label for="inputName">Nombre</label>
                    <input type="nombre" class="form-control" name="inputName" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Correo Electronico</label>
                    <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
                        placeholder="Correo Electronico">
                </div>
                <div class="form-group">
                    <label for="inputUsername">Nombre de Usuario</label>
                    <input type="username" class="form-control" name="inputUsername" placeholder="Nombre de Usuario">
                </div>
                <div class="form-group">
                    <label for="formInforme">Informar</label>
                    <textarea class="form-control" name="formInforme" rows="5">{{ $informe->informe ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-info bg-white">Enviar informe</button>
            @endif
              </form>
            </form>
        </div>
  @endguest
</div>
@endsection
