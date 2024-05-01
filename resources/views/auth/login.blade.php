@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/markus-spiske-187777.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Login',
'navbarClass'=>'navbar-transparent',
'activePage'=>'login',

])

@section('content')




<div class="content">


    <div class="container" style="padding-bottom: 150px;">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card card-login">
                    <div class="card-header ">
                        <div class="card-header ">
                            <h3 class="header text-center">{{ __('Login') }}</h3>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-single-02"></i>
                                </span>
                            </div>
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') ?? 'harold0887@hotmail.com' }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="text-danger text-xs mt-1">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="nc-icon nc-single-02"></i>
                                </span>
                            </div>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>

                            @if ($errors->has('password'))
                            <span class="text-danger text-xs mt-1">
                                {{ $errors->first('password') }}
                            </span>

                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" checked>
                                    <span class="form-check-sign"></span>
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" id="login">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-round mb-3">{{ __('Sign in') }}</button>
                        </div>
                    </div>
                    <div class="ml-2 text-xs ">
                        <a href="{{ route('password.request') }}" class="text-muted btn-link">
                            {{ __('Forgot password') }} ?
                        </a>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
@if (session('status'))
@push('js')
<script>
    $.notify({
        icon: "check_circle",
        message: "{{session('status')}}",
    }, {
        type: "success",
        timer: 3000,
        placement: {
            from: "top",
            align: "right",
        },
    });
</script>
@endpush
@endif

@push('js')
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush