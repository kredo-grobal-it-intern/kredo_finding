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
          <div class="likingNum">You liked {{ $you_liked->total() }} people</div>
          <h2 class="pageTitle">List of people you liked</h2>
          <div class="likingList">
            @foreach($you_liked as $you_liked_user)
            <div class="liking_wrap">
              @if(isWorker(Auth::id()))
                <a href="{{ route('company_detail.show', $you_liked_user->id) }}" @if($you_liked_user->companyUser->img_name) class="liking_img" @endif>{{ profileImageInLike($you_liked_user->companyUser->img_name) }}</a>
                <div class="liking_name">{{ $you_liked_user->companyUser->name.'  ['.App\Constants\Occupation::Occupation[$you_liked_user->occupation].']' }}
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at)) }}</p>
                </div>
                <form action="{{ route('reaction.changeLikedToDislike' ,$you_liked_user->id) }}" method="post" class="mb-0">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="dislike_icon fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.2rem;"></i></button>
                </form>
              @else
                <a href="{{ route('user_detail.show', $you_liked_user->id) }}" @if($you_liked_user->img_name) class="liking_img" @endif>{{ profileImageInLike($you_liked_user->img_name) }}</a>
                <div class="liking_name">{{ $you_liked_user->name }} <span class="text-primary">have {{ $you_liked_user->toUserId->where('status', 0)->count() }} likes</span>
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at)) }}</p>
                </div>
                <form action="{{ route('reaction.changeLikedToDislike' ,$you_liked_user->id) }}" method="post" class="mb-0">
                  @csrf
                  @method('PATCH')

                  <button type="submit" class="dislike_btn btn btn-danger btn-sm"><i class="dislike_icon fa-solid fa-thumbs-down text-white mx-auto" style="font-size:1.2rem;"></i></button>
                </form>
              @endif
            </div>
            @endforeach
            {{ $you_liked->links() }}
          </div>
        </div>

        <div id="content2" class="tab_content">
          <div class="likingNum">{{ isWorker(Auth::id()) ? $liked_by->count(): $liked_by_count->count() }} people liked you</div>
          <h2 class="pageTitle">List of people who liked you</h2>
          <div class="likingList">

              @if (!isWorker(Auth::id()))
               @foreach( $liked_by_count as $liked_by_user )
               <div class="liking_wrap">
                <a href="{{ route('user_detail.show', $liked_by_user->id) }}" @if($liked_by_user->img_name) class="liking_img" @endif>{{ profileImageInLike($liked_by_user->img_name) }}</a>
                <div class="liking_name">{{ $liked_by_user->name }} <span class="text-primary">have {{ $liked_by_user->toUserId->where('status', 0)->count() }} likes</span>
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($liked_by_user->created_at))}}</p>
                </div>
                <form method="POST" action="{{ route('chat.show') }}">
                  @csrf
                  <input name="user_id" type="hidden" value="">
                </form>
               </div>
               @endforeach
              @else
               @foreach ($liked_by as $liked_by_user)
               <div class="liking_wrap">
                <a href="{{ route('company_detail.show', $liked_by_user->fromUserId->id) }}" @if($liked_by_user->fromUserId->img_name) class="liking_img" @endif>{{ profileImageInLike($liked_by_user->fromUserId->img_name) }}</a>
                <div class="liking_name">{{ $liked_by_user->fromUserId->name }}
                  <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($liked_by_user->created_at))}}</p>
                </div>

                <form action="{{ route('reaction.changeDislikedToLike' ,$liked_by_user->fromUserId->id) }}" method="post" class="mb-0">
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
              @endif
            {{ $liked_by->links()  }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
