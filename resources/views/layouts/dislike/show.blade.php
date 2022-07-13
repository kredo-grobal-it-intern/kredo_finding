@extends('layouts.layout')

@section('content')
  <div class="showLikePage">
    <header class="header">
      <i class="fa-solid fa-heart-crack fa-3x"></i>
      <div class="header_logo"><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a></div>
    </header>

      <div class="container mt-3">
        <div>
          <div class="likingNum">You disliked {{ $you_liked->count() }} people</div>
          <h2 class="pageTitle">List of people you disliked</h2>
          <div class="likingList">

            @foreach($you_liked as $you_liked_user)
            <div class="likingPerson row">
              @if ($you_liked_user->toUserId->img_name)
               <div class="liking_img col-auto"><img src="{{ $you_liked_user->toUserId->img_name }}"></div>
              @else
                @if ($you_liked_user->toUserId->user_type == 1)
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

              <form action="{{ route('reaction.ChangeDisliked' ,$you_liked_user->toUserId->id) }}" method="post" class="mb-0">
                @csrf
                @method('PATCH')
                <button type="submit" class="col-auto btn btn-primary">Liked</button>
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
