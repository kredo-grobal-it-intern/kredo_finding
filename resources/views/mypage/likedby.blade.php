<div class="likingList row">
    @foreach ($liked_by as $liked_by_user)
        <div class="liking_wrap card border-0">
            @if (!isWorker(Auth::id()))
                <div class="icon">
                    <a href="{{ route('user_detail.show', $liked_by_user->fromWorkerId->id) }}"
                        @if ($liked_by_user->fromWorkerId->img_name) class="liking_img" @endif>
                        {{ profileImageInLike($liked_by_user->fromWorkerId->img_name) }}
                    </a>
                </div>
                <div class="liking_name">{{ $liked_by_user->fromWorkerId->name }} <i class="fa-solid fa-heart text-danger"
                        style="font-size: 0.7rem;">
                        {{ App\Constants\Occupation::Occupation[$liked_by_user->toJobId->occupation] }}</i>
                    <p class="h5 text-secondary">{{ date('m/d/Y', strtotime($liked_by_user->created_at)) }}</p>
                </div>
                <form method="POST" action="{{ route('chat.show') }}">
                    @csrf
                    <input name="user_id" type="hidden" value="">
                </form>
            @else
                <div class="icon">
                    <a href="{{ route('company_detail.show', $liked_by_user->fromUserId->id) }}"
                        @if ($liked_by_user->fromUserId->img_name) class="liking_img" @endif>{{ profileImageInLike($liked_by_user->fromUserId->img_name) }}</a>
                </div>
                <div class="liking_name text-center mt-2">
                    <p class="h5">{{ $liked_by_user->fromUserId->name }}</p>
                    <p class="h6 text-secondary">{{ date('m/d/Y', strtotime($liked_by_user->created_at)) }}</p>
                </div>

                <div class="reactionicon">
                    <form action="{{ route('reaction.changeLikedToDislike', $liked_by_user->fromUserId->id) }}"
                        method="post" class="">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-thumbs-up like-icon"></i>
                        </button>
                        <button type="submit" class="btn"><i
                                class="fa-solid fa-thumbs-down dislike-icon"></i></button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
