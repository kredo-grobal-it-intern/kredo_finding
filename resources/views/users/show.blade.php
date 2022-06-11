@extends('layouts.layout')

@section('content')

  <div class='usershowPage'>
    <div class='container'>
      <header class="header">
        <p class='header_logo'>
          <a href="{{ route('home') }}">
            <img src="/storage/images/kredo_logo.jpg">
          </a>
        </p>
      </header>
      <div class='userInfo'>
        <div class='userInfo_img'>
          @if($user->image_name)
            <img src="/storage/images/{{ $user->img_name }}">
          @else
            <i class="fa-solid fa-circle-user profile-icon d-block text-center profile-icon"></i>
          @endif
        </div>
        <div class='userInfo_name'>{{ $user -> name }}</div>
        <div class='userInfo_selfIntroduction'>{{ $user -> self_introduction }}</div>
      </div>

      <div class='userAction'>
        <div class="userAction_edit userAction_common">

          <a href="/users/edit/{{ $user->id }}"><i class="fas fa-edit fa-2x"></i></a>

          <span>Edit Profile</span>

        </div>
        <div class='userAction_logout userAction_common'>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fas fa-cog fa-2x"></i></a>
          <span>Logout</span>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>

    </div>
  </div>

@endsection
