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
                            <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1"
                                class="tab"></label>
                            <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2"
                                class="tab">Sign Up</label>
                            <div class="login-space">
                                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="sign-up-form">
                                        <div class="group">
                                            <label for="name" class="label">Name</label>
                                            <input id="name" type="text"
                                                class="input @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="Create your name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="group">
                                            <label for="email" class="label">Email Address</label>
                                            <input id="email" type="text"
                                                class="input @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Enter your email address">
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
                                                required autocomplete="new-password" data-type="password"
                                                placeholder="Create your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="group">
                                            <label for="confirmpass" class="label">Repeat Password</label>
                                            <input id="confirmpass" type="password" class="input" data-type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Repeat your password">
                                        </div>

                                        <div class="group">
                                            <input type="submit" class="button" value="Sign Up">
                                        </div>
                                        <div class="hr"></div>
                                        <div class="foot">
                                            <label for="tab-1">Already Member?</label>
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
