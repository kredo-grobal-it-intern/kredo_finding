@extends('layouts.layout')

@section('content')
    <div class="chatbox">
        <div class="chatbox_header">
            <a href="{{ route('matching') }}" class="linkToMatching">
                <div class="user_icon header_user_icon">
                    @if($chat_room_user->img_name)
                    <span class="matchingPerson_img">{{ profileImageInMessage($chat_room_user->img_name) }}</span>
                    @else
                    <i class="fa-solid fa-user matchingPerson_img"></i>
                    @endif
                </div>
            </a>
            <div class="chatbox_detail pt-1">
                <p class="chatbox_header_user_name">{{ $chat_room_user->name }}</p>
                <p class="chatbox_user_status">online</p>
            </div>
        </div>
        <div class="chatbox_main">
            <div class="msg_from_you">
                @foreach ($chat_messages as $message)
                    @if ($message->user_id == Auth::id())
                    <div class="message me">
                        <span>{{ $message->message }}</span>
                    </div>
                    @else
                    <div class="chatbox_user_icon">
                        @if($chat_room_user->img_name)
                        <span class="matchingPerson_img">{{ profileImageInMessage($chat_room_user->img_name) }}</span>
                        @else
                            @if(isWorker(Auth::id()))
                            <i class="fa-solid fa-building matchingPerson_img"></i>
                            @else
                            <i class="fa-solid fa-user matchingPerson_img"></i>
                            @endif
                        @endif
                    </div>
                    <div class="message you">
                        <span>{{ $message->message }}</span>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <form class="chatbox_footer" method="POST" action="{{ route('chat.chat') }}">
            <div class='enter_message'>
                <input type="text" data-behavior="chat_message" class="messageInputForm_input enter_message" placeholder="Type your message here...">
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
