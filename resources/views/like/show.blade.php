@extends('layouts.layout')

@section('content')
  <div class="showLikePage">
    <header class="header">
      <i class="fas fa-heart fa-3x"></i>
      <div class="header_logo"><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a></div>
    </header>

    <div class="tabs mt-5">
      <input id="tab1" type="radio" name="tab_btn" checked>
      <input id="tab2" type="radio" name="tab_btn">

      <div class="tab_area">
        <label class="tab1_label" for="tab1">You Liked</label>
        <label class="tab2_label" for="tab2">Liked By</label>
      </div>

      <!-- タブの中身 -->
      <div class="content_area">
        <div id="content1" class="tab_content">
          <div class="likingNum">You liked {{ $you_liked->count() }} people</div>
          <h2 class="pageTitle">List of people you liked</h2>
          <div class="likingList">

            @foreach($you_liked as $you_liked_user)
            <div class="likingPerson row">
              @if ($you_liked_user->toUserId->img_name)
               <div class="liking_img col-auto"><img src="{{ $you_liked_user->toUserId->img_name }}"></div>
              @else
                @if ($you_liked_user->toUserId->user_type == 0)
                  <i class="fa-solid fa-circle-user me-5"></i>
                @else
                  <i class="fa-solid fa-building me-5"></i>
                @endif
              @endif
               <div class="liking_name col">{{ $you_liked_user->toUserId->name }}</div>

              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="">
              </form>

              <form action="{{ route('reaction.ChangeLiked' ,$you_liked_user->toUserId->id) }}" method="post" class="mb-0">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger btn-sm" style="border-radius:50%;"><i class="fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.5rem;"></i></button>
              </form>
            </div>
            @endforeach
          </div>
        </div>

        <div id="content2" class="tab_content">
          <div class="likingNum">{{ $liked_by->count() }} people liked you</div>
          <h2 class="pageTitle">List of people who liked you</h2>
          <div class="likingList">

            @foreach( $liked_by as $liked_by_user)
            <div class="likingPerson row">
              @if ($liked_by_user->fromUserId->img_name)
               <div class="liking_img col-auto"><img src="{{ $liked_by_user->fromUserId->img_name }}"></div>
              @else
                @if ($liked_by_user->fromUserId->user_type == 0)
                   <i class="fa-solid fa-circle-user me-5"></i>
                @else
                   <i class="fa-solid fa-building me-5"></i>
                @endif
              @endif
               <div class="liking_name col">{{ $liked_by_user->fromUserId->name }}</div>

              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="">
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
