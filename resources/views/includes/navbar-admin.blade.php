<!-- Navbar -->
<nav id="navbar-transparent-admin" class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-icon btn-round">
                    <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                    <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                </button>
            </div>
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}">Inicio</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <livewire:search-admin />
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-magnify" href="#" data-toggle="dropdown">
                        <i class="nc-icon nc-layout-11"></i>

                    </a>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                    </div>
                </li>
                @auth
                <li class="nav-item btn-rotate dropdown" id="logout">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">

                                @php
                                $name = explode(" ", Auth::user()->name);
                                echo $name[0];
                                @endphp


                            </span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('dashboard.edit') }}">{{ __('My Profile') }}</a>
                            <div id="logout-btn">
                                <a style="cursor:pointer" class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Logout') }}</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->