@extends('layouts.layout')

@section('content')
    <div class='signinPage'>
        <div class="row">
            <div class="" id="signPicture">
            </div>
            <div class='col-7 signinputholder'>
                <div class='userIcon'>
                    <i class="fas fa-user fa-3x"></i>
                </div>
                <h2 class="title text-dark text-center mt-3">WELCOME</h2>
                <form class="form w-50 mx-auto" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group @error('email')has-error @enderror mt-4 row">
                        <div class="signInIcon col-1">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="col-11">
                            <input type="email" name="email" class="signInInfo form-control-plaintext"
                                value="{{ old('email') }}"placeholder="email" autofocus>
                            @error('email')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('password')has-error @enderror row">
                        <div class="signInIcon col-1">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="col-11">
                            <input type="password" name="password" class="signInInfo form-control-plaintext"
                                placeholder="password">
                            @error('password')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="loginBtn">LOGIN</button>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">

                                <label for="remember" class="form-check-label">{{ __('Remember me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body border-0 rounded-0 w-100 p-2">
                        <button type="button" class="btn rounded-0 facebookBtn">
                            <div class="row">
                                <div class="col-2 text-white">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="col-10">
                                    <a href="{{ route('facebook.redirect') }}">
                                        <div class="d-lg-block text-white">Log in with Facebook</div>
                                    </a>
                                </div>
                            </div>
                        </button>

                        <button type="button" class="btn btn-danger rounded-0 mt-3">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa-brands fa-google"></i>
                                </div>
                                <div class="col-10">
                                    <a href="{{ route('google.redirect') }}">
                                        <div class="d-lg-block text-white">Sign in with Google+</div>
                                    </a>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="text-center">
                                <a href="{{ route('register') }}" class="text-dark">Create new account</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('password.request') }}" class="text-primary text-center d-block">
                                Forget Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
