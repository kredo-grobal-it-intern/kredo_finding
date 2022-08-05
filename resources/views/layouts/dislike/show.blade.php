@extends('layouts.layout')

@section('content')
  <div class="showLikePage">
    <div class="container mt-3">
      <div>
        <div class="likingNum">You disliked {{ $you_liked->count() }} people</div>
        <h2 class="pageTitle">List of people you disliked</h2>
        <div class="likingList col-10 mx-auto">
          @foreach($you_liked as $you_liked_user)
            @if(Auth::user()->user_type == App\Constants\UserType::Company)
              <div class="likingPerson row mb-3 align-items-center">
                <a href="#" @if($you_liked_user->toUserId->img_name) class="liking_img col-auto" @endif>{{ profileImageInLike($you_liked_user->toUserId->img_name) }}</a>
                <div class="liking_name col pl-0 pb-3">{{ $you_liked_user->toUserId->name }}</div>

                <form action="{{ route('reaction.changeDislikedToLike' ,$you_liked_user->toUserId->id) }}" method="post" class="col-auto">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-primary">Liked</button>
                </form>
              </div>
            @else
              <div class="likingPerson row mb-3 align-items-center">
                <a href="#" @if($you_liked_user->companyUser->img_name) class="liking_img col-auto" @endif>{{ profileImageInLike($you_liked_user->companyUser->img_name) }}</a>
                <div class="liking_name col pl-0 pb-3">{{ $you_liked_user->companyUser->name.' ['.App\Constants\Occupation::Occupation[$you_liked_user->occupation].']' }}</div>

                <form action="{{ route('reaction.changeDislikedToLike' ,$you_liked_user->id) }}" method="post" class="col-auto">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-primary">Liked</button>
                </form>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
