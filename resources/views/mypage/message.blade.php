@extends('layouts.layout')

@section('content')
  {{-- <div class="matchingPage">
    <div class="container">
      <div class="mt-5">
        <div class="matchingNum">You've matched with {{ $match_users_count }} people</div>
        <h2 class="pageTitle">List of matched people</h2>
        <div class="matchingList">
          @foreach( $matching_users as $user)
            <div class="matchingPerson">
              <a href="#" class="text-dark @if($user->img_name) matchingPerson_img @endif">{{ profileImageInMessage($user->img_name) }}</a>
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
  </div> --}}

  <div class="messageBox">
    <div class="users_chat">
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">is typing...</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
      <div class="chatbox_for_every_user">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="" class="user_icon">
        </div>
        <div class="chatbox_detail">
          <span class="chatbox_user_name">user name</span>
          <span class="chatbox_user_msg">Hey, what's up?</span>
        </div>
        <div class="chatbox_timestamp">
          <span class="time">11:45</span>
        </div>
      </div>
    </div>
    <div class="chatbox">
      <div class="chatbox_header">
        <div class="chatbox_user_icon">
          <img src="{{ asset('images/facebook.png') }}" alt="user icon" class="user_icon">
        </div>
        
        <div class="chatbox_detail">
          <p class="chatbox_header_user_name">snapchat</p>
          <p class="chatbox_user_status">online</p>
        </div>        
      </div>
      <div class="chatbox_main">
        <div class="msg_for_you">
          <img src="{{ asset('images/facebook.png') }}" alt="user icon" class="user_icon_for_msg">
          <div class="message you">
            <span class="message you">Hey, what's up?</span>
          </div>
          <div class="message you">
            <p class="message you">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus molestias recusandae quod veritatis nostrum! Sapiente, dignissimos maxime nobis doloremque aliquid aperiam reiciendis ea dolorem aut illum cupiditate. Aut, delectus. Sapiente officiis dolorem id reiciendis pariatur mollitia ipsam delectus provident hic!</p>
          </div>
        </div>        
        
        <div class="message me">
          <span class="message me">Lorue!</span>
        </div>
        <div class="message me">
          <span class="message me">Lorue!</span>
        </div>

        <div class="msg_for_you">
          <img src="{{ asset('images/facebook.png') }}" alt="user icon" class="user_icon_for_msg">
          <div class="message you">
            <span class="message you">Hey, what's up?</span>
          </div>
          <div class="unit_you">
            <p class="message you">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus molestias recusandae quod veritatis nostrum! Sapiente, dignissimos maxime nobis doloremque aliquid aperiam reiciendis ea dolorem aut illum cupiditate. Aut, delectus. Sapiente officiis dolorem id reiciendis pariatur mollitia ipsam delectus provident hic!</p>
          </div>
        </div>

        <div class="message me">
          <span class="message me">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quisquam ullam unde nisi optio magni, corrupti aperiam animi beatae, tenetur harum numquam consequatur modi accusantium adipisci et incidunt soluta error dignissimos odit ea facere minus. Ea, aliquam aut id nemo consequuntur non error. Ipsam accusantium repellendus sunt placeat molestias distinctio?</span>
        </div>

        
      </div>
      <div class="chatbox_footer">
        <textarea name="enter_message" id="enter_message" class="enter_message" cols="30" placeholder="Type your message here..."></textarea>
        <button type="submit" class="send_button">Send</button>
      </div>
    </div>
  </div>  

@endsection
