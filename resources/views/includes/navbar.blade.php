<nav id="{{$navbarClass}}"  class="navbar navbar-expand-lg navbar-absolute fixed-top navbar navbar-dark {{$navbarClass}}">
    <div class="container ">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}" style="color:#51cbce !important">Plantillas</a>
        </div>
        <button class="navbar-toggler btn-primary" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navigation">
            <ul class="navbar-nav">
               
               
               
                <li class="nav-item  {{ $activePage == 'home' ? 'active':''}} ">
                    <a href="{{route('home')}}" class="nav-link ">
                        <i class="nc-icon nc-single-02"></i>Cliente
                    </a>
                </li>
                <li class="nav-item  {{ $activePage == 'internal' ? 'active':''}} ">
                    <a href="{{route('internal')}}" class="nav-link ">
                        <i class="nc-icon nc-spaceship"></i>Contacto interno
                    </a>
                </li>
                <li class="nav-item  {{ $activePage == 'contactos' ? 'active':''}} ">
                    <a href="{{route('contactos')}}" class="nav-link ">
                        <i class="nc-icon nc-badge"></i>Directorio
                    </a>
                </li>
                <li class="nav-item {{ $activePage == 'dahboard' ? 'active':''}}">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nc-icon nc-layout-11"></i> {{ __('Dashboard') }}
                    </a>
                </li>
            

                @guest
                
                <li class="nav-item   {{ $activePage == 'login' ? 'active':''}}">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nc-icon nc-tap-01"></i>{{ __('Login') }}
                    </a>
                </li>
                @endif

                @auth
                <li class="nav-item  {{ $activePage == 'perfil' ? 'active':''}}  dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-circle-10"></i>

                        @php
                        $name = explode(" ", Auth::user()->name);
                        echo $name[0];
                        @endphp

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background:#e9e9e8;">

                        <a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('My Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                      this.closest('form').submit();">Salir</a>
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
