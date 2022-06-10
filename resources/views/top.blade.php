@extends('layouts.layout')

@section('content')
  <div class="loginPage">
    <div class="container">
      <div class="loginPage_contents">
        <h1 class="h3 loginPage_contents_title">Let's find new colleague</h1>
        <div class="btn loginPage_contents_btn"><a class="text-white" href="{{ route('login') }}">Log in with email</a></div>
        <div class="btn loginPage_contents_btn bg-white border"><a class="text-primary" href="{{ route('login') }}"><i class="fa-brands fa-facebook"></i>Log in with Facebook</a></div>
        <div class="btn loginPage_contents_btn bg-white border"><a class="text-dark" href="{{ route('register') }}">Create New Account</a></div>
      </div>
    </div>
  </div>
@endsection
