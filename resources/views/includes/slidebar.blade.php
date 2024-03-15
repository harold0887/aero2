<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('img/logo-small.png') }}">
            </div>
        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
            Name APP
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if (isset(auth()->user()->picture))
                <img src="{{ Storage::url(Auth::user()->picture) }}">
                @else
                <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                @endif
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        @auth
                        {{ auth()->user()->name }}
                        @endauth
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse  {{ $folderActive == 'profile' ? 'show' : '' }}" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('MP') }}</span>
                                <span class="sidebar-normal">{{ __('My Profile') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOutSidebar" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a onclick="document.getElementById('formLogOutSidebar').submit();">
                                <span class="sidebar-mini-icon">{{ __('LO') }}</span>
                                <span class="sidebar-normal">{{ __('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class=" nav-item {{ $activePage == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'plantillas' ? 'active' : '' }}">
                <a href="{{ route('post.index') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>Plantillas</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'internal' ? 'active' : '' }}">
                <a href="{{ route('internal.index') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Contacto interno</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'contactos' ? 'active' : '' }}">
                <a href="{{ route('correo.index') }}">
                    <i class="nc-icon nc-chat-33"></i>
                    <p>Contactos</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'casos' ? 'active' : '' }}">
                <a href="{{ route('casos.index') }}">
                    <i class="nc-icon nc-email-85"></i>
                    <p>Casos</p>
                </a>
            </li>





        </ul>
    </div>
</div>