<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="{{ asset('inicio') }}">
      <img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img') }}" alt="...">
    </a>
    <!-- User -->
  @include('layouts.user')
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="{{ asset('argon/index.html') }}">
              <img src="{{ asset('argon/assets/img/brand/blue.png') }}">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Navigation -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ asset('perfilindex') }}">
            <i class="ni ni-single-02 text-yellow"></i> Perfil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ asset('equipoindex') }}">
            <i class="ni ni-planet text-blue"></i> Equipos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('jornadas.index') }}">
            <i class="ni ni-tv-2 text-orange"></i> Jornadas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ asset('pronosticosindex')}}">
            <i class="ni ni-archive-2 text-black"></i>Pronosticos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ asset('resultadosindex') }}">
            <i class="ni ni-bullet-list-67 text-green"></i> Resultados
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
