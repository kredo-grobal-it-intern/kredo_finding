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

      <div class="content_area">
        <div id="content1" class="tab_content">
          @include('mypage.youliked')
        </div>
        <div id="content2" class="tab_content">
          @include('mypage.likedby')
        </div>
      </div>
    </div>
  </div>
@endsection
