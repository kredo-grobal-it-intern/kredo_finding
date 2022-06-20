@extends('layouts.layout')

@section('content')

  <div class="topPage">
    <nav class="nav">
      <ul>
        <li class="personIcon">
          @if (Auth::user()->img_name)
            <a href="/users/show/{{ Auth::id() }}"><img src="/storage/images/{{ Auth::user()->img_name }}" class="profile-image-navbar"></a>
          @else
            <a href="/users/show/{{ Auth::id() }}"><i class="fas fa-user fa-2x"></i></a>
          @endif
        </li>
        <li class="appIcon"><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a></li>
        <li class="heartIcon"><a href="{{ route('like') }}"><i class="fas fa-2x fa-heart"></i></a></li>
        <li class="messageIcon"><a href="{{ route('matching') }}"><i class="fas fa-2x fa-comments"></i></a></li>
      </ul>
    </nav>

    <div id="tinderslide">
      <ul>
        @foreach($users as $user)
          @if(!$user->isLiked() && $user->id !== Auth::user()->id)
          <li data-user_id="{{ $user->id }}">
            <div class="userName">{{ $user->name }}</div>
            @if($user->img_name)
              <img src="/storage/images/{{ $user->img_name }}" class="profile-image">
            @else
              <i class="fa-solid fa-user profile-icon d-block text-center profile-icon"></i>
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
