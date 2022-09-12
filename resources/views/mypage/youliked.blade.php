<div class="likedList row">
  @if (!isWorker(Auth::id()))
    @foreach( $you_liked as $user)
      <div class="liked_wrap card border-0 mt-4">
          <div class="icon">
            <a href="{{ route('user_detail.show', $user->toUserId->id) }}" @if($user->toUserId->img_name) class="liking_img" @endif>{{ profileImageInLike($user->toUserId->img_name) }}</a>
          </div>
          <div class="liked_name text-center mt-2">
            <p class="h5">{{ $user->toUserId->name }}</p>
            <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($user->created_at)) }}</p>
          </div>
          <div class="reactionicon">
            <form action="#" method="">
              <button type="submit" class="btn">
                <i class="fa-solid fa-thumbs-down dislike-icon"></i>
              </button>
            </form>
          </div>
      </div>
    @endforeach
  @else
    @foreach ( $you_liked as $user)
      <div class="liked_wrap card border-0 mt-4">
          <div class="icon">
            <a href="{{ route('company_detail.show', $user->company->id) }}" @if($user->company->img_name) class="liking_img" @endif>{{ profileImageInLike($user->company->img_name) }}</a>
          </div>
          <div class="liked_name text-center mt-2">
            <p class="h5">{{ $user->company->name }}</p>
            <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($user->company->created_at))}}</p>
          </div>
          <div class="reactionicon">
            <form action="#" method="">
              <button type="submit" class="btn">
                <i class="fa-solid fa-thumbs-down dislike-icon"></i>
              </button>
            </form>
          </div>
      </div>
    @endforeach
  @endif
 </div>



