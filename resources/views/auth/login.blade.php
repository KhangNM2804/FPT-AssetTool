@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="">
            <div class="card-login">
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
                                            class="input @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="current-password" data-type="password"
                                            placeholder="Enter your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <input id="check" type="checkbox" class="check" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                    </div>
                                    <div class="group d-flex justify-content-center ">
                                        <div class="g-recaptcha" id="feedback-recaptcha"
                                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    </div>
                                    <div class="group d-flex justify-content-center ">
                                        <strong style="color: red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </div>
                                    <div class="group">
                                        <input type="submit" class="button" value="Sign In">
                                    </div>
                                    <div class="group">
                                        <a href="{{ route('loginMicrosoft') }}" class="button"
                                            style="text-align: center; background-color: rgb(17, 108, 130)"><i
                                                class="fab fa-microsoft"></i><span> Continue with
                                                Microsoft</span></a>
                                    </div>
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
@endsection
