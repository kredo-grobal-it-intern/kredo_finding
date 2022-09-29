<div class="likedList row">
  @if (!isWorker(Auth::id()))
    @if (count($you_liked) == 0)
      <span>You haven't liked any users</span>
    @else
      @foreach( $you_liked as $you_liked_user)
        <div class="liked_wrap card border-0 mt-4">
            <div class="icon">
              <a href="{{ route('user_detail.show', $you_liked_user->toUserId->id) }}" @if($you_liked_user->toUserId->img_name) class="liking_img" @endif>{{ profileImageInLike($you_liked_user->toUserId->img_name) }}</a>
            </div>
            <div class="liked_name text-center mt-2">
              <p class="h5">{{ $you_liked_user->toUserId->name }}</p>
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
    <div class="col-md-12">
      <div class="d-flex justify-content-center mt-3">{{ $you_liked->links() }}<div> 
    </div>
  @else
    @if (count($you_liked) == 0)
      <span>You haven't liked any users</span>
    @else
      @foreach ( $you_liked as $you_liked_user )
        <div class="liked_wrap card border-0 mt-4">
          <div class="icon">
            <a href="{{ route('company_detail.show', $you_liked_user->company->id) }}" @if($you_liked_user->company->img_name) class="liking_img" @endif>{{ profileImageInLike($you_liked_user->company->img_name) }}</a>
          </div>
          <div class="liked_name text-center mt-2">
            <p class="h5">{{ $you_liked_user->company->name }}</p>
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
    
    <div class="col-md-12">
      <div class="d-flex justify-content-center mt-3">{{ $you_liked->links() }}<div> 
    </div>
  @endif
</div>
