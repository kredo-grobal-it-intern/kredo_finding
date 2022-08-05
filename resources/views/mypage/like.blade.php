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
              @if(Auth::user()->user_type === App\Constants\UserType::Worker)
                <a href="#" @if($you_liked_user->companyUser->img_name) class="liking_img" @endif>{{ showProfileImageInLike($you_liked_user->companyUser->img_name) }}</a>
                <div class="liking_name">{{ $you_liked_user->companyUser->name.'  ['.App\Constants\Occupation::Occupation[$you_liked_user->occupation].']' }} 
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at)) }}</p>
                </div>
                <form action="{{ route('reaction.changeLikedToDislike' ,$you_liked_user->id) }}" method="post" class="mb-0">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="dislike_icon fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.2rem;"></i></button>
                </form>
              @else
                <a href="#" @if($you_liked_user->toUserId->img_name) class="liking_img" @endif>{{ showProfileImageInLike($you_liked_user->toUserId->img_name) }}</a>
                <div class="liking_name">{{ $you_liked_user->toUserId->name }}
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at)) }}</p>
                </div>
                <form action="{{ route('reaction.changeLikedToDislike' ,$you_liked_user->toUserId->id) }}" method="post" class="mb-0">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="dislike_icon fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.2rem;"></i></button>
                </form>
              @endif
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
              @if (Auth::user()->user_type === App\Constants\UserType::Company)
                <a href="#" @if($liked_by_user->fromWorkerId->img_name) class="liking_img" @endif>{{ showProfileImageInLike($liked_by_user->fromWorkerId->img_name) }}</a>
                <div class="liking_name">{{ $liked_by_user->fromWorkerId->name }} <i class="fa-solid fa-heart text-danger" style="font-size: 0.7rem;"> {{ App\Constants\Occupation::Occupation[$liked_by_user->toJobId->occupation] }}</i>
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($liked_by_user->created_at))}}</p>
                </div>
                <form method="POST" action="{{ route('chat.show') }}">
                  @csrf
                  <input name="user_id" type="hidden" value="">
                </form>
              @else
                <a href="#" @if($liked_by_user->fromUserId->img_name) class="liking_img" @endif>{{ showProfileImageInLike($liked_by_user->fromUserId->img_name) }}</a>
                <div class="liking_name">{{ $liked_by_user->fromUserId->name }}
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($liked_by_user->created_at))}}</p>
                </div>

                <form method="POST" action="{{ route('chat.show') }}">
                  @csrf
                  <input name="user_id" type="hidden" value="">
                </form>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
