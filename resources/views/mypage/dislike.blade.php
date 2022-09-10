@extends('layouts.layout')

@section('content')
<div class="likingList row mt-5 mx-3">
  @if (isWorker(Auth::id()))
    @foreach( $dislike_job as $job)
      <div class="liking_wrap card border-0">
        <div class="icon">
          <a href="{{ route('company_detail.show', $job->company->id) }}" @if($job->company->img_name) class="liking_img" @endif>{{ profileImageInLike($job->company->img_name) }}</a>
        </div>
        <div class="liking_name text-center mt-2">
          <p class="h5">{{ $job->company->name }}</p>
        </div>
        <div class="reactionicon">
          <form action="{{ route('reaction.changeDislikedToLike' ,$job->id) }}" method="post" class="">
            {{-- @csrf --}}
            @method('PATCH')
            <button type="submit" class="btn">
              <i class="fa-solid fa-thumbs-up like-icon"></i>
            </button>
          </form>
        </div>
      </div>
    @endforeach
  @else
    @foreach ($dislike_user as $user )
      <div class="liking_wrap card boreder-0">
        <div class="icon">
          <a href="{{ route('user_detail.show', $user->toUserId->id) }}" @if($user->toUserId->img_name) class="liking_img" @endif>{{ profileImageInLike($user->toUserId->img_name) }}</a>
        </div>
        <div class="liking_name text-center">{{ $user->toUserId->name }} <i class="fa-solid fa-heart text-danger" style="font-size: 0.7rem;">{{ App\Constants\Occupation::Occupation[$user->toUserId->occupation] }}</i>
            <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($user->created_at))}}</p>
        </div>
          <form method="POST" action="{{ route('chat.show') }}">
            @csrf
            <input name="user_id" type="hidden" value="">
          </form>
        <div class="reactionicon">
          <form action="{{ route('reaction.changeDislikedToLike' ,$user->toUserId->id) }}" method="post" class="">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn">
              <i class="fa-solid fa-thumbs-up like-icon"></i>
            </button>
          </form>
        </div>
      </div>
      @endforeach
  @endif
</div>
@endsection


