@extends('layouts.layout')

@section('content')

  <div class="topPage">
    <nav class="nav">
      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="/images/kredo_logo.jpg">
        </a>
      </div>
      <div class="myPageIcon">
        @if (Auth::user()->img_name)
            <a href="{{ route('profile.show', Auth::user()->id) }}"><img src="{{ Auth::user()->img_name }}" class="profile-image-navbar"></a>
          @else
          @if (Auth::user()->user_type == 0)
            <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fa-solid fa-circle-user"></i></a>
          @else
            <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fas fa-building fa-2x"></i></a>
          @endif
        @endif
      </div>
      <span>
        <a href="{{ route('mypage.show') }}" class="text-dark font-weight-bold">MyPage</a>
      </span>
    </nav>

    <div id="tinderslide">
      <ul>
        @foreach($users as $user)
          @if(!$user->isLiked() && $user->id !== Auth::user()->id)
          <li data-user_id="{{ $user->id }}">
            <div class="userName">{{ $user->name }}</div>
            @if($user->img_name)
              <img src="{{ $user->img_name }}" class="profile-image">
            @else
              @if ($user->user_type == 0)
                <i class="fa-solid fa-user profile-icon d-block text-center"></i>
              @else
                <i class="fa-solid fa-building profile-icon d-block text-center"></i>
              @endif
            @endif
            <div class="like"></div>
            <div class="dislike"></div>
          </li>
          @endif
        @endforeach
      </ul>
      <div class="noUser">There is no user around here</div>
    </div>
    <div class="actions" id="actionBtnArea">
      <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i></a>
      <a href="#" class="like"><i class="fas fa-heart fa-2x"></i></a>
    </div>
  </div>

  <script>
    var usersNum = {{ $userCount }};
    var from_user_id = {{ $from_user_id }};
  </script>

@endsection
