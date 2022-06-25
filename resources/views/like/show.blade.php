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
          <div class="likingNum">you liked ○ people</div>
          <h2 class="pageTitle">List of people you liked</h2>
          <div class="likingList">
            <div class="like_profiles">
              <div>image</div>
              <div class="like_name">username</div>
              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="">
              </form>
            </div>
          </div>
        </div>

        <div id="content2" class="tab_content">
          <div class="likingNum">○ people liked you</div>
          <h2 class="pageTitle">List of people who liked you</h2>
          <div class="likingList">
            <div class="like_profiles">
              <div>image</div>
              <div class="like_name">username</div>
              <form method="POST" action="{{ route('chat.show') }}">
                @csrf
                <input name="user_id" type="hidden" value="">
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


@endsection
