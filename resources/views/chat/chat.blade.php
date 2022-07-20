@extends('layouts.layout')
@section('content')

  <div class="chatPage">
    <!-- <header class="header">
      <a href="{{ route('matching') }}" class="linkToMatching"></a>
      <div class="chatPartner">
        <div class="chatPartner_img"><img src="{{$chat_room_user -> img_name}}"></div>
        <div class="chatPartner_name">
          @if ($chat_room_user -> img_name)
            <img src="{{$chat_room_user -> img_name}}">
          @else
            @if ($chat_room_user->chat_room_id == 1)
              <i class="fa-solid fa-user index-icon"></i>
            @else
              <i class="fa-solid fa-building index-icon"></i>
            @endif
          @endif
          {{ $chat_room_user -> name }}
        </div>
      </div>
    </header> -->
    <div class="container">
      <div class="messagesArea messages">
        @foreach($chat_messages as $message)
          <div class="message">
            @if ($chat_room_user -> img_name)
              <img src="{{$chat_room_user -> img_name}}">
            @else
              @if ($chat_room_user->chat_room_id == 0)
                <i class="fa-solid fa-user index-icon"></i>
              @else
                <i class="fa-solid fa-building index-icon"></i>
              @endif
            @endif
            @if($message->user_id == Auth::id())
              <span>{{ Auth::user()->name }}</span>
            @else
              <span>{{ $chat_room_user_name }}</span>
            @endif

            <div class="commonMessage">
              <div>
                {{ $message->message }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <form class="messageInputForm" method="POST" action="{{ route('chat.chat') }}">
      <div class='container'>
        <input type="text" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力...">
      </div>
    </form>
  </div>

  <script>
    var chat_room_id = {{ $chat_room_id }};
    var user_id = {{ Auth::user()->id }};
    var current_user_name = "{{ Auth::user()->name }}";
    var chat_room_user_name = "{{ $chat_room_user_name }}";
  </script>

@endsection
