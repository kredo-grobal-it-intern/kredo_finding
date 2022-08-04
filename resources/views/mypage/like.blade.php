@extends('layouts.layout')

@section('content')

  <div class="showLikePage">
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
            <div class="liking_wrap">
              @if ($you_liked_user->toUserId->img_name)
              <div class="liking_img"><img src="{{ $you_liked_user->toUserId->img_name }}"></div>
              @else
                @if ($you_liked_user->toUserId->user_type == 0)
                <a href="{{ route('user_detail.show', $you_liked_user->toUserId->id) }}">
                  <i class="fa-solid fa-circle-user me-5"></i>
                </a>
                @else
                <a href="{{ route('company_detail.show', $you_liked_user->toUserId->id) }}">
                  <i class="fa-solid fa-building me-5"></i>
                </a>
                @endif
              @endif
              <div class="liking_name">{{ $you_liked_user->toUserId->name }}
                <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at)) }}</p>
              </div>
              <form action="{{ route('reaction.ChangeLiked' ,$you_liked_user->toUserId->id) }}" method="post" class="mb-0">
                @csrf
                @method('PATCH')
                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="dislike_icon fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.2rem;"></i></button>
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
            <div class="liking_wrap">
              @if ($liked_by_user->fromUserId->img_name)
              <div class="liking_img"><img src="{{ $liked_by_user->fromUserId->img_name }}"></div>
              @else
                @if ($liked_by_user->fromUserId->user_type == 0)
                <a href="{{ route('user_detail.show', $liked_by_user->fromUserId->id) }}">
                  <i class="fa-solid fa-circle-user me-5"></i>
                </a>
                @else
                <a href="{{ route('company_detail.show', $liked_by_user->fromUserId->id) }}">
                  <i class="fa-solid fa-building me-5"></i>
                </a>
                @endif
              @endif
              <div class="liking_name">{{ $liked_by_user->fromUserId->name }}
                <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($liked_by_user->created_at))}}</p>
              </div>
              <form action="{{ route('reaction.ChangeDisliked' ,$liked_by_user->fromUserId->id) }}" method="post" class="mb-0">
                @csrf
                @method('PATCH')
                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="like_icon fa-solid fa-thumbs-up text-white mx-auto" style="font-size:1.2rem;"></i></button>
              </form>

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
@endsection
