@extends('layouts.layout')

@section('content')

  <div class="matchingPage">
    <header class="header">
      <i class="fas fa-comments fa-3x"></i>
      <div class="header_logo"><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a></div>
    </header>
    <div class="container">
      <div class="mt-5">
        <div class="matchingNum">You've matched with {{ $match_users_count }} people</div>
        <h2 class="pageTitle">List of matched people</h2>
        <div class="matchingList">
          @foreach( $matching_users as $user)
            <div class="matchingPerson">
              <div class="matchingPerson_img"><img src="/storage/images/{{ $user->img_name }}"></div>
              <div class="matchingPerson_name">{{ $user->name }}</div>

              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="{{ $user->id }}">
                <button type="submit" class="chatForm_btn">Open Chat</button>
              </form>

            </div>
          @endforeach
        </div>
        <div>
        </div>
      </div>

@endsection
