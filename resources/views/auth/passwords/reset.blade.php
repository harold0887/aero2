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


<div class="content">
    @if (session('status'))
    <div class="alert alert-warning" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="container" style="padding-bottom: 150px;">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
                <div class="card-body ">
                    <form id="forgot-password-reset" class="form" method="POST" action="{{ route('password.update') }}">

                        @csrf

                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        <div class="card-header ">
                            <h3 class="header text-center">{{ __('Reset Password') }}</h3>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="nc-icon nc-single-02"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') ?: $request->email }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="nc-icon nc-key-25"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="{{ old('password') }}" required>
                            </div>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="nc-icon nc-key-25"></i></span>
                                </div>
                                <input class="form-control" name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" type="password" value="{{ old('password_confirmation') }}" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-round mb-3">{{ __('Reset Password') }}</button>
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