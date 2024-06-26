@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/markus-spiske-187777.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Password reset',
'navbarClass'=>'navbar-transparent',
'activePage'=>'login',

])

@section('content')



@section('content')
<div class="content">
    <div class="container">
        <div class="col-lg-5 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
                <div class="card-body ">
                    <div class="card-header ">
                        <h3 class="header text-center">{{ __('Reset Password') }}</h3>
                    </div>
                    <div class="text-center">
                        <span class="text-muted">Ingresa tu correo electrónico para recibir un link y reestablecer tu contarseña.</span>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form id="forgot-password" class="form" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="nc-icon nc-single-02"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                            <div>
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-round mb-3">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush