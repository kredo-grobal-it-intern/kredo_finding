@extends('layouts.layout')

@section('content')
  <div class="loginPage">
    <div class="loginPage_title">
      <h1 class="h3 ">Let's find new colleague</h1>
    </div>
    <div class="topVideo">
      <video src="/storage/videos/pexels-yan-krukov-7692917.mp4" autoplay muted></video>
    </div>
    <div class="btn loginPage_btn"><a class="text-white" href="{{ route('login') }}">Log in with email</a></div>
  </div>
@endsection
