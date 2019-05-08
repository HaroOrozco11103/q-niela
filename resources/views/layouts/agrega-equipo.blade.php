@guest
<br>
@else
@if(\Auth::user()->equipo_id == NULL)
<div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{ Auth::user()->nombre }} no tienes equipo asígnado actualmente, puedes agregar un equipo haciendo click <a
        href="{{ route('users.edit', $user->id) }}">aquí</a> o en la sección editar perfil.
</div>
@endif
@endguest
