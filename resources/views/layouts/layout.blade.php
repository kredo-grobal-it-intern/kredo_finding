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
  <script src=“https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js”></script>
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
          @if(Auth::user()->user_type === App\Constants\UserType::Company)
          <a href="{{ route('posting.create') }}" class="{{ request()->is('mypage/create/posting') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-file-circle-plus"></i>
            <span class="font-weight-bold">Job Posting</span>
          </a>
          @endif
          <a href="{{ route('logout') }}" style="padding: 1.2rem 1rem;" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-door-open logout-hover"></i>
                <span class="font-weight-bold">LOGOUT</span>
          </a>
        </div>
      </div>
      <div class="col-9" style="padding-left:0px;">
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
