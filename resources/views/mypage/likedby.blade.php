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
                <div class="liking_name text-center mt-2">
                    <p class="h5">{{ $liked_by_user->fromWorkerId->name }}</p>
                    <p class="h6 text-secondary">{{ date('m/d/Y', strtotime($liked_by_user->created_at)) }}</p>
                </div>
                <div class="reactionicon row">
                    <form action="{{ route('reaction.changeDislikedToLike', $liked_by_user->fromWorkerId->id) }}" method="post" class="col pr-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-thumbs-up like-icon"></i>
                        </button>
                    </form>
                    <form action="{{ route('reaction.changeLikedToDislike', $liked_by_user->fromWorkerId->id) }}" method="post" class="col pl-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-thumbs-down dislike-icon"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="icon">
                    <a href="{{ route('company_detail.show', $liked_by_user->companyUser->id) }}"
                        @if ($liked_by_user->companyUser->img_name) class="liking_img" @endif>
                        {{ profileImageInLike($liked_by_user->companyUser->img_name) }}
                    </a>
                </div>
                <div class="liking_name text-center mt-2">
                    <p class="h5">{{ $liked_by_user->companyUser->name }}</p>
                    <p class="h6 text-secondary">{{ date('m/d/Y', strtotime($liked_by_user->companyUser->created_at)) }}</p>
                </div>

                <div class="reactionicon row">
                    <form action="{{ route('reaction.changeDislikedToLike', $liked_by_user->id) }}"method="post" class="col pr-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-thumbs-up like-icon"></i>
                        </button>
                    </form>
                    <form action="{{ route('reaction.changeLikedToDislike', $liked_by_user->id) }}" method="post" class="col pl-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-thumbs-down dislike-icon"></i>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
