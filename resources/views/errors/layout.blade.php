<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        {{ $title.' | APP' ?? 'APP' }}
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->

     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

     <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body class="{{ $class }}">

    <div class="wrapper wrapper-full-page ">
        <div class="full-page section-image" filter-color="black" data-image="{{ asset($backgroundImagePath ?? "img/bg/fabio-mangione.jpg") }}">
            @yield('content')
            @include('includes.footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('/demo/demo.js') }}"></script>

    @stack('scripts')

</body>

</html>