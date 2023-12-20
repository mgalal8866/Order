@extends('layouts.auth.layout')
@section('title')
    Login
@stop
@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0">
                <div class="card-body">
                    <a   class="brand-logo">
                        <img src="{{ getimage('logos',$setting->logo_shop)}}" width="10%" />
                        <h2 class="brand-text text-primary ms-1">{{ $setting->name_shop }}</h2>
                    </a>

                    {{-- <h4 class="card-title mb-1">Welcome to Vuexy! 👋</h4> --}}
                    {{-- <p class="card-text mb-2">Please sign-in to your account and start the adventure</p> --}}

                    <form class="auth-login-form mt-2" action="{{ route('postlogin') }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="login-username" class="form-label">{{ __('tran.username') }}</label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="admin" aria-describedby="username"
                                tabindex="1" value="{{ old('username') }}" required autocomplete="username" autofocus />

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">

                                <label class="form-label" for="login-password">{{ __('tran.password') }}</label>
                                {{-- @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password"
                                    class="form-control form-control-merge  @error('password') is-invalid @enderror"
                                    id="password" name="password" tabindex="2"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required autocomplete="password" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    tabindex="3" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember-me">{{__('tran.rememberme')}}</label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">{{ __('tran.signin') }}</button>
                    </form>

                    {{-- <p class="text-center mt-2">
                        <span>New on our platform?</span>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    </p> --}}

                    {{-- <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div> --}}

                    {{-- <div class="auth-footer-btn d-flex justify-content-center">
                        <a href="{{ route('social.redirect','facebook') }}" class="btn btn-facebook">
                            <i data-feather="facebook"></i>
                        </a>
                        <a href="{{ route('social.redirect','twitter') }}" class="btn btn-twitter white">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="{{ route('social.redirect','google') }}" class="btn btn-google">
                            <i data-feather="mail"></i>
                        </a>
                        <a href="{{ route('social.redirect','github') }}" class="btn btn-github">
                            <i data-feather="github"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>

@endsection
