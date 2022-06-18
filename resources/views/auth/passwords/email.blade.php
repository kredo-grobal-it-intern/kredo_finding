@extends('layouts.layout')

@section('content')
    <div class="forgotPasswordPage">
        <header class="header">
            <div>Reset Password</div>
        </header>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class='container'>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <div class="col-md-6 mx-auto  mt-4">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
            </form>
    </div>

@endsection
