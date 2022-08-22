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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

@if(Request::is('mypage/*')||Request::is('users/mypage/*'))
  <!-- @include('mypage.navbar') -->
  <main class="sideBar_area">
    <div class="row">
      <!-- for mypage-->
      <div class="col-3 sideBar">
        <div class="logo">
          <a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg" style="height: 5rem; width:5rem;"></a>
        </div>
        <p class="menu font-weight-bold">Main Menu</p>
        <div class="list-group">
          <a href="{{ route('users.show', Auth::user()->id) }}" class="{{ request()->is('users/mypage/show/*') ? 'active' : '' }} sideBarItem">
            {{ profileImageInMypage() }}
            <span class="font-weight-bold">PROFILE</span>
          </a>
          <a href="{{ route('reaction.show') }}" class="{{ request()->is('mypage/reaction') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-heart"></i>
            <span class="font-weight-bold">LIKE</span>
          </a>
          <a href="{{ route('reaction.showDisliked') }}" class="{{ request()->is('mypage/reaction/showDisliked') ? 'active' : '' }} sideBarItem">
            <i class="fa-solid fa-heart-crack"></i>
            <span class="font-weight-bold">DisLIKE</span>
          </a>
          <a href="{{ route('matching') }}" class="{{ request()->is('mypage/matching') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-comment-dots"></i>
            <span class="font-weight-bold">MESSAGES</span>
          </a>

          <a href="{{ route('contact.show') }}" class="sideBarItem">
            <i class="fa-solid fa-envelope"></i>
            <span class="font-weight-bold">CONTACT</span>
          </a>

          @if(!isWorker(Auth::id()))
          <a href="{{ route('posting.create') }}" class="{{ request()->is('mypage/create/posting') ? 'active' : '' }} sideBarItem">
            <i class="fas fa-file-circle-plus"></i>
            <span class="font-weight-bold">Job Posting</span>
          </a>
          @endif
          <a href="{{ route('logout') }}" class="sideBarItem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="fas fa-door-open logout-hover"></i>
            <span class="font-weight-bold">LOGOUT</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
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
