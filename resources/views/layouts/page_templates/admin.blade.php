<div class="wrapper">

    @include('includes.slidebar')
    @include('includes.fixed-plugin')

    <div class="main-panel">
        
        @include('includes.navbar-admin')
        @yield('content')
        <!-- @include('includes.footer') -->
    </div>
</div>