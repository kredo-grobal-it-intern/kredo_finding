@extends('layouts.layout')

@section('content')

<div class="matchingPage">
  @if ( $matching_users->isNotEmpty())
    <div class="matchingList">
      @foreach( $matching_users as $user)
        <div class="matchingPerson">
          <div class="user_icon">
            @if($user->img_name)
              <span>{{ profileImageInMessage($user->img_name) }}</span>
            @else
              @if(isWorker(Auth::id()))
              <i class="fa-solid fa-building matchingPerson_img text-center pt-3 fa-2x"></i>
              @else
              <i class="fa-solid fa-user matchingPerson_img"></i>
              @endif
            @endif
          </div>
          <div class="chatbox_detail">
            <span class="matchingPerson_name">{{ $user->name }}</span>
            <form method="POST" action="{{ route('chat.show') }}">
              @csrf
              <input name="user_id" type="hidden" value="{{ $user->id }}">
              <button type="submit" class="chatForm_btn btn-small btn-primary mt-2 ml-2">Open Chat</button>
            </form>
          </div>
          <div class="chatbox_timestamp">
            <span class="time">{{ \Carbon\Carbon::now()->format("Y/m/d") }}</span>
          </div>
        </div>
      @endforeach
    </div>
  @else
  <p class="no_messages">No messages</p>
  @endif  
</div>
@endsection
