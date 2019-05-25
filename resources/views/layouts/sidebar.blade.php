<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ asset('inicio') }}">
            <img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
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
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                      @guest
                        <i class="ni ni-single-02 text-yellow"></i> Perfil
                      @else
                        @if(\Auth::user()->tipo == "admin")
                          <i class="ni ni-single-02 text-yellow"></i> Usuarios
                        @else
                          <i class="ni ni-single-02 text-yellow"></i> Mi Perfil
                        @endif
                      @endguest
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos.index') }}">
                      @guest
                        <i class="ni ni-planet text-blue"></i> Mi Equipo
                      @else
                        @if(\Auth::user()->tipo == "admin")
                            <i class="ni ni-planet text-blue"></i> Equipos
                        @else
                            <i class="ni ni-planet text-blue"></i> Mi Equipo
                        @endif
                      @endguest
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jornadas.index') }}">
                        <i class="ni ni-tv-2 text-orange"></i> Jornadas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pronosticos.index') }}">
                      @guest
                        <i class="ni ni-chart-bar-32 text-pink"></i>Mis pronosticos
                      @else
                          @if(\Auth::user()->tipo == "admin")
                            <i class="ni ni-chart-bar-32 text-pink"></i>Pronosticos
                          @else
                            <i class="ni ni-chart-bar-32 text-pink"></i>Mis pronosticos
                          @endif
                      @endguest
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('partidos.index') }}">
                      @guest
                        <i class="ni ni-bullet-list-67 text-green"></i> Resultados
                      @else
                          @if(\Auth::user()->tipo == "admin")
                            <i class="ni ni-bullet-list-67 text-green"></i> Partidos
                          @else
                            <i class="ni ni-bullet-list-67 text-green"></i> Resultados
                          @endif
                      @endguest
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <ul class="navbar-nav mb-3">
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('informes.index') }}">
                        @guest
                          <i class="ni ni-bulb-61 text-muted"></i> Enviar Informe
                        @else
                            @if(\Auth::user()->tipo == "admin")
                              <i class="ni ni-bulb-61 text-muted"></i> Leer Informes
                            @else
                              <i class="ni ni-bulb-61 text-muted"></i> Enviar Informe
                            @endif
                        @endguest
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
