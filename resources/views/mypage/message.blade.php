@extends('layouts.layout')

@section('content')
  <div class="matchingPage">
    <div class="container">
      <div class="mt-5">
        <div class="matchingNum">You've matched with {{ $match_users_count }} people</div>
        <h2 class="pageTitle">List of matched people</h2>
        <div class="matchingList">
          @foreach( $matching_users as $user)
            <div class="matchingPerson">
              <a href="#" class="text-dark @if($user->img_name) matchingPerson_img @endif">{{ showProfileImageInMessage($user->img_name) }}</a>
              <div class="matchingPerson_name">{{ $user->name }}</div>
              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="{{ $user->id }}">
                <button type="submit" class="chatForm_btn">Open Chat</button>
              </form>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
