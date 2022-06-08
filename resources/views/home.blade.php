@extends('layouts.layout')

@section('content')

  <div class="topPage">
    <nav class="nav">
      <ul>
        <li class="personIcon">
          <a href="/users/show/{{ Auth::id() }}"><i class="fas fa-user fa-2x"></i></a></li>
        <li class="appIcon"><a href="{{ route('home') }}"><img src="/storage/images/kredo_logo.jpg"></a></li>

        <li class="messageIcon"><a href="{{ route('matching') }}"><i class="fas fa-2x fa-comments"></i></a></li>

      </ul>
    </nav>
    
    <div id="tinderslide">
      <ul>
        @foreach($users as $user)
          @if(!$user->isLiked())
          <li data-user_id="{{ $user->id }}">
            <div class="userName">{{ $user->name }}</div>
            <img src="/storage/images/{{ $user->img_name}}">
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
