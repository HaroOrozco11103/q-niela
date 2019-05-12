@extends('layouts.home-layout')

@section('content')
<div class="card shadow">
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
                <textarea class="form-control" name="formInforme" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-info bg-white">Submit</button>
        </form>
    </div>

</div>
@endsection
