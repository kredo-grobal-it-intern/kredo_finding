@extends('layouts.layout')

@section('content')

  <div class="matchingPage">
    <div class="matchingList">
      @foreach( $matching_users as $user)
        <div class="matchingPerson">
          <div class="user_icon">
            @if($user->img_name)
              <span>{{ profileImageInMessage($user->img_name) }}</span>
            @else
              <i class="fa-solid fa-user matchingPerson_img"></i>
            @endif
          </div>
          <div class="chatbox_detail">
            <span class="matchingPerson_name">{{ $user->name }}</span>
            <span class="matchingPerson_message">Hey, what's up?</span>
          </div>
          <div class="chatbox_timestamp">
            <span class="time">{{ \Carbon\Carbon::now()->format("Y/m/d") }}</span>
          </div>
        </div>
      @endforeach
    </div>
    
    <div class="chatbox">
      <div class="chatbox_header">
        <div class="user_icon header_user_icon">
          @if($user->img_name)
              <span>{{ profileImageInMessage($user->img_name) }}</span>
            @else
              <i class="fa-solid fa-user matchingPerson_img"></i>
            @endif
        </div>
        <div class="chatbox_detail">
          <p class="chatbox_header_user_name">snapchat</p>
          <p class="chatbox_user_status">online</p>
        </div>
      </div>

      <div class="chatbox_main">
        <div class="msg_from_you">
          <div class="chatbox_user_icon">
            @if($user->img_name)
              <span>{{ profileImageInMessage($user->img_name) }}</span>
            @else
              <i class="fa-solid fa-user matchingPerson_img"></i>
            @endif
          </div>

          <div class="message you">
            <span>Hey, what's up?</span>
          </div>
          <div class="message you">
            <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus molestias recusandae quod veritatis nostrum! Sapiente, dignissimos maxime nobis doloremque aliquid aperiam reiciendis ea dolorem aut illum cupiditate. Aut, delectus. Sapiente officiis dolorem id reiciendis pariatur mollitia ipsam delectus provident hic!</p>
          </div>
        </div>
        
        <div class="message me">
          <span>Hi!</span>
        </div>
        <div class="message me">
          <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, recusandae! Reprehenderit aspernatur est dolore voluptatibus totam natus! Sit, adipisci? Repellat?</span>
        </div>
        <div class="message me">
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit?</span>
        </div>

        <div class="msg_from_you">
          <div class="chatbox_user_icon user_icon_for_msg">
            @if($user->img_name)
              <span>{{ profileImageInMessage($user->img_name) }}</span>
            @else
              <i class="fa-solid fa-user matchingPerson_img"></i>
            @endif
          </div>
          <div class="message you">
            <span>Hey, what's up?</span>
          </div>
          <div class="message you">
            <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus molestias recusandae quod veritatis nostrum! Sapiente, dignissimos maxime nobis doloremque aliquid aperiam reiciendis ea dolorem aut illum cupiditate. Aut, delectus. Sapiente officiis dolorem id reiciendis pariatur mollitia ipsam delectus provident hic!</span>
          </div>
        </div>

        <div class="message me">
          <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quisquam ullam unde nisi optio magni, corrupti aperiam animi beatae, tenetur harum numquam consequatur modi accusantium adipisci et incidunt soluta error dignissimos odit ea facere minus. Ea, aliquam aut id nemo consequuntur non error. Ipsam accusantium repellendus sunt placeat molestias distinctio?</span>
        </div>
      </div>

      <div class="chatbox_footer">
        <textarea name="enter_message" id="enter_message" class="enter_message" cols="30" placeholder="Type your message here..."></textarea>
        <button type="submit" class="send_button">Send</button>
      </div>
    </div>
  </div>
@endsection
