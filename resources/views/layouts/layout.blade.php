<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Kredo finding') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

@if(Request::is('mypage/*')||Request::is('users/mypage/*'))
  @include('mypage.navbar')
  <main class="sideBar_area">
    <div class="row">
      <!-- for mypage-->
      <div class="col-3 sideBar">
        <div class="list-group">
          <a href="{{ route('profile.show', Auth::user()->id) }}" class="{{ request()->is('users/mypage/show/*') ? 'active' : '' }} sideBarItem">
            @if (Auth::user()->user_type == 0)
              <i class="fas fa-user"></i>
            @else
              <i class="fas fa-building fa-2x"></i>
            @endif
            <span class="font-weight-bold">PROFILE</span>
          </a>
          <a href="{{ route('reaction.show') }}" class="{{ request()->is('mypage/reaction') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-heart"></i>
            <span class="font-weight-bold">LIKE</span>
          </a>
          <a href="{{ route('matching') }}" class="{{ request()->is('mypage/matching') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-comments"></i>
            <span class="font-weight-bold">MESSAGES</span>
          </a>
        </div>
      </div>
      <div class="col-9">
        @yield('content')
      </div>
    </div>
  </main>
@else
  @yield('content')
@endif

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
