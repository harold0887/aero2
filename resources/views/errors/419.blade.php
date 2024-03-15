@extends('errors.layout', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Error 419',
'navbarClass'=>'',
'activePage'=>'',
])

@section('content')




<div class="content text-center">

    <div class="row ">
        <div class="col-md-12 error-page text-white">
            <h1 class="title">419</h1>
            <h2>{{ __('Page expired') }} :(</h2>
            <h4>{{ __('Ooooups! Looks like your token has expired') }}.</h4>
        </div>
        <div class="col-md-12 mt-5">

            <a href="{{ route('home') }}" class="text-white btn btn-outline-primary btn-lg">
                <i class="material-icons  mr-2">home</i>
                <span>Volver al inicio</span>
            </a>

        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush