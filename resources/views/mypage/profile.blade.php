@extends('layouts.layout')

@section('content')

  <div class='usershowPage'>
    <div class='profile_container'>
      <div class="inner_container mt-0" style="width:auto;">
        <div class="left innerbox">
          <div class="left_up">
              <div class='userInfo_img'>
                @if($user->img_name)
                  <img src="{{ $user->img_name }}">
                @else
                  <i class="{{ $user->user_type === App\Constants\UserType::Worker ? 'fa-solid fa-circle-user' : 'fas fa-building fa-2x' }} profile-icon d-block text-center mt-4"></i>
                @endif
              </div>
              <div class='userInfo_name'>{{ $user->name }}</div>
            </div>
          <div class="left_down">
            <div class='userAction'>
              <div class="userAction_edit userAction_common">
                <a href="/users/edit/{{ $user->id }}"><i class="fas fa-edit fa-3x text-white"></i></a>
                <span class="h4 text-white">EDIT</span>
               </div>
              <div class='userAction_logout userAction_common'>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-door-open fa-3x text-white logout-hover"></i></a>
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
            <h1 class="mt-5 mx-4">{{ $user->user_type === App\Constants\UserType::Worker ? 'Self introduction' : 'Services' }}</h1>
            <div class='userInfo_selfIntroduction'>{{ $user -> self_introduction }}</div>
            @if($user->user_type === App\Constants\UserType::Worker)
            <h1 class="mt-5 mx-4">Gender</h1>
            <div class="form-check form-check-inline mx-4">
              @if ($user->gender === 0)
                <h2 class="form-check" for="inlineRadio1">male</h2>
              @elseif($user->gender === 1)
                <h2 class="form-check" for="inlineRadio2">female</h2>
              @else
                <h2 class="form-check" for="inlineRadio2">not entered</h2>
              @endif
            </div>
            @endif
            <h1 class="mt-5 mx-4">{{ $user->user_type === App\Constants\UserType::Worker ? 'Personal Information' : 'Company Information' }}</h1>
            <h2 type="email" name="email" class="mt-4 mx-4"><i class="fa-solid fa-envelope profile-icon-for-show"></i>{{ $user->email }}</h2>
            <h2 type="munber" name="contact_number" class="mt-4 mx-4" ><i class="fa-solid fa-phone profile-icon-for-show"></i>{{ $user->contact_number }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
