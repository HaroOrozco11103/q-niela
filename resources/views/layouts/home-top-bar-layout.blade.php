<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- User -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" style="color:black;" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:black;" href="{{ route('register') }}">{{ __('Crear Cuenta') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" style="color:black;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->nombre }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" >
                          Administrar
                      </a>

                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                      </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
      </div>
    </nav>
