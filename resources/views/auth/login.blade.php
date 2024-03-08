@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-fluid">
        <div class ="row">
            <div class="col-md-6 mx-auto p-0">
                <div class="card">
                    <div class="login-box">
                        <div class="login-snip">
                            <input id="tab-1" type="radio" name="tab" class="sign-in"checked><label for="tab-1"
                                class="tab">Login</label>
                            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                                class="tab"></label>
                            <div class="login-space">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="login">
                                        <div class="group">
                                            <label for="user" class="label">Username</label>
                                            <input id="user" type="text"
                                                class="input @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Enter your email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="group">
                                            <label for="pass" class="label">Password</label>
                                            <input id="pass" type="password"
                                                class="input @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" data-type="password"
                                                placeholder="Enter your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="group">
                                            <input id="check" type="checkbox" class="check" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="Sign In">
                                        </div>
                                        <div class="group">
                                            <a href="{{route('loginMicrosoft')}}" class="button" style="text-align: center; background-color: rgb(17, 108, 130)"><i class="fab fa-microsoft"></i><span> Continue with
                                                Microsoft</span></a>
                                        </div>
                                        <div class="hr"></div>
                                        <div class="foot">
                                            <a href="{{ route('register') }}">Create an Account?</a> <br>
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
