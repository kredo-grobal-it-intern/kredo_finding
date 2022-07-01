@extends('layouts.layout')

@section('content')
  <div class="loginPage">
    <div class="loginPage_title">
      <h1 class="h3 ">Let's find new colleague</h1>
    </div>
    <div class="topVideo">
      <video src="/videos/pexels-yan-krukov-7692917.mp4" autoplay muted></video>
    </div>
    <div class="btn loginPage_login_btn"><a class="text-white" href="{{ route('login') }}">Log in with email</a></div>
    <div class="btn loginPage_new_account_btn bg-white mx-auto mt-3"><a class="text-dark" href="{{ route('register') }}">Create New Account</a></div>
  </div>
@endsection
