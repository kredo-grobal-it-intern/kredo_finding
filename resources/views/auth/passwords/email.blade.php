@extends('layouts.layout')

@section('content')
    <div class="forgotPasswordPage">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class='forgotPage'>
            <div class="content p-5">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <div class="mt-4">
                            <h1 class="p-5 text-secondary">Forgot Your Password??</h1>


                            <p class="lead">Enter the emali address associated with your account.</p>

                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn submitBtn">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>

                    <div class="form-group text-center">
                        Don't have an acount?
                        <a href="{{ route('register') }}" class="text-primary">Sign up</a>
                    </div>
                </form>
            </div>

            <div class="forgotImage"></div>

        </div>
    </div>
@endsection
