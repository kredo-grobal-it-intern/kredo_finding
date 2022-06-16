@extends('layouts.layout')

@section('content')
  <div class='signinPage'>
    <div class='container'>
      <div class='userIcon'>
        <i class="fas fa-user fa-3x"></i>
      </div>
      <h2 class="title">Log in</h2>
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group @error('email')has-error @enderror">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}"placeholder="Enter your email address" autofocus>
          @error('email')
          <span class="errorMessage">
          {{ $message }}
        </span>
          @enderror
        </div>

        <div class="form-group @error('password')has-error @enderror">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter your email password">
          @error('password')
          <span class="errorMessage">
          {{ $message }}
        </span>
          @enderror
        </div>

        <div class="form-group text-center">
          <button type="submit" class="loginBtn">Log in</button>
        </div>
        <div class="form-group row justify-content-center">
          <div class="col-md-8 text-center">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="remember">

              <label for="remember" class="form-check-label">{{ __('Remember me') }}</label>
            </div>
          </div>
        </div>
        <a href="{{ route('google.redirect') }}">
          <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" class="d-block mx-auto mt-3">
        </a>
        <div class="linkToLogin">
          <a href="{{ route('register') }}">Create new account</a>
        </div>
      </form>
    </div>
  </div>
@endsection

