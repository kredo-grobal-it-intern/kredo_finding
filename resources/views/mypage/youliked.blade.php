<!-- <div class = "likedList row">
    @foreach( $you_liked as $you_liked_user)
    <div class = "liked_wrap card border-0">
        @if (!isWorker(Auth::id()))
          <div class = "icon">
             <a href="{{ route('user_detail.show', $you_liked_user->fromWorkerId->id)  }}" @if($you_liked_user->fromWorkerId->img_name) class="liked_img" @endif>{{ profileImageInLike($you_liked_user->fromWorkerId->img_name) }}</a>
           </div>
           <div class="liked_name">{{ $you_liked_user->fromWorkerId->name }} <i class="fa-solid fa-heart text-danger" style="font-size o.7rem;"></i> {{  App\Constants\Occupation::Occupation[$you_liked_user->toJobId->occupation] }}
             <p class="h5 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at))}}</p>
           </div>
           <form method="POST" action="{{ route('chat.show') }}">
             @csrf
             <input name="user_id" type="hidden" value="">
           </form>
         @else
           <div class="icon">
             <a href="{{ route('company_detail.show', $you_liked_user->fromUserId->id) }}"></a>
           </div>
           <div class="liking-name text-center mt-2">
             <p class="h5">{{ $you_liked_user->fromUserId->name }}</p>
             <p class="h6 text-secondary">{{ date("m/d/Y", strtotime($you_liked_user->created_at))}} </p>
           </div>
           </div>

           <div class="reactionicon">
             <form action="{{ route('reaction.changeLikedToDislike' ,$you_liked_user->fromUserId->id) }}" method="post" class=""">
               @csrf
               @method('PATCH')
               <button type="submit" class="btn">
                 <i class="fa-solid fa-thumbs-up like-icon"></i>
              </button>
              <button type="submit" class="btn"><i class="fa-solid fa-thumbs-up dislike-icon"></i></button>
            </form>
           </div>
         @endif
     </div>
     @endforeach
</div> -->
@foreach ($you_liked as $user )
    <li>{{ $user->toUserId->name }}</li>    
@endforeach
