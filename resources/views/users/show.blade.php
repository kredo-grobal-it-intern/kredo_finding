@extends('layouts.layout')

@section('content')

  <div class='usershowPage'>
    <div class='profile_container'>
      <div class="inner_container">
        <div class="left innerbox">
          <div class="left_up">
              <div class='userInfo_img'>
                @if($user->img_name)
                  <img src="{{ $user->img_name }}"  class="">
                @else
                  <i class="fa-solid fa-circle-user profile-icon d-block text-center mt-4"></i>
                @endif
              </div>
              <div class='userInfo_name'>{{ $user -> name }}</div>
            </div>
          <div class="left_down">
            <div class='userAction'>
              <div class="userAction_edit userAction_common">
                <a href="/users/edit/{{ $user->id }}"><i class="fas fa-edit fa-3x text-white"></i></a>
                <span class="h4 text-white">EDIT</span>
               </div>
              <div class='userAction_logout userAction_common'>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-door-open fa-3x text-white"></i></a>
                <span class="h4 text-white">LOGOUT</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="right innerbox">
          <div class='userInfo'>
            <h1 class="mt-5 mx-4">Self Introdution</h1>
            <div class='userInfo_selfIntroduction'>{{ $user -> self_introduction }}</div>
            <h1 class="mt-5 mx-4">Gender</h1>
            <div class="form-check form-check-inline mx-4">
              <input class="form-check-input" name="gender" value="0" type="radio" id="inlineRadio1"
                  @if ($user->gender === 0) checked @endif>
              <h2 class="form-check-label" for="inlineRadio1">male</h2>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="gender" value="1" type="radio" id="inlineRadio2"
                  @if ($user->gender === 1) checked @endif>
              <h2 class="form-check-label" for="inlineRadio2">female</h2>
            </div>
            <h1 class="mt-5 mx-4">Personal Information</h1>
            <h2 type="email" name="email" class="mt-4 mx-4" >{{ $user->email }}</h2>
          </div>
        </div>
      </div>
      <div class="logo">
        <p class='header_logo'>
          <a href="{{ route('home') }}">
            <img src="/images/kredo_logo.jpg">
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection

