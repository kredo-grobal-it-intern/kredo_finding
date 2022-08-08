@extends('layouts.layout')

@section('content')

  <div class="homePage">
    <nav class="nav">
      <div class="searchIcon">
        <label class="open" onclick="myFunction()" for="pop-up"><i class="fa-solid fa-magnifying-glass"></i></label>
        <input type="checkbox" id="pop-up">
        <div class="overlay">
          <div class="window px-0" id="window">
            <label class="close" for="pop-up">×</label>
            @if (Auth::user()->user_type == 0)
               @include('search.userhomepage')
            @else
               @include('search.homepage')
            @endif
          </div>
        </div>
      </div>

      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="/images/kredo_logo.jpg">
        </a>
      </div>

      <div class="myPageIcon">
        @if (Auth::user()->img_name)
            <a href="{{ route('profile.show', Auth::user()->id) }}"><img src="{{ Auth::user()->img_name }}" class="profile-image-navbar"></a>
          @else
          @if (Auth::user()->user_type == 0)
            <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fa-solid fa-circle-user"></i></a>
          @else
            <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fas fa-building fa-2x"></i></a>
          @endif
        @endif
      </div>
      <span>
        <a href="{{ route('profile.show', Auth::user()->id) }}" class="text-dark font-weight-bold">MyPage</a>
      </span>
    </nav>

    <div id="tinderslide">
      <ul>
        @if(Auth::user()->user_type === App\Constants\UserType::Company)
          @foreach($users as $user)
            @if(!$user->isLiked())
              <li data-user_id="{{ $user->id }}">
                <div class="userName">{{ $user->name }}</div>
                @if($user->img_name)
                  <img src="{{ $user->img_name }}" class="profile-image">
                @else
                  @if ($user->user_type == 0)
                    <i class="fa-solid fa-user profile-icon d-block text-center"></i>
                  @else
                    <i class="fa-solid fa-building profile-icon d-block text-center"></i>
                  @endif
                @endif
                <div class="like"></div>
                <div class="dislike"></div>
              </li>
            @endif
          @endforeach
        @else
          @foreach ($job_postings as $jobPosting)
            @if(!$jobPosting->isLiked())
              <li data-user_id="{{ $jobPosting->id }}" class="text-left p-0">
                <div class="jobPosting card">
                  <div class="card-header row pb-0 align-items-center">
                    <div class="col-auto pr-0">
                      @if($jobPosting->companyUser->img_name)
                        <div class="mb-5 ml-5"><img src="{{ $jobPosting->companyUser->img_name }}" class="rounded-circle d-inline"></div>
                      @else
                        <i class="fa-solid fa-building mr-3"></i>
                      @endif
                    </div>
                    <div class="col pl-0"><h3>{{$jobPosting->companyUser->name }}</h3></div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title display-5 mb-2 pl-1">Occupation</h3>
                    <p class="card-text fw-lighter">{{ App\Constants\Occupation::Occupation[$jobPosting->occupation] }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Industry</h3>
                    <p>{{ App\Constants\JobPosting::Industry[$jobPosting->industry] }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Work Location<h3>
                    <p>{{ $jobPosting->city.', '.$jobPosting->state.', '.$countries[$jobPosting->country] }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Employment status<h3>
                    <p>{{ App\Constants\EmploymentStatus::EmploymentStatus[$jobPosting->employment_status] }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Working hours<h3>
                    <p>{{ $jobPosting->opening_time.' ~ '.$jobPosting->closing_time }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Salary<h3>
                    <p>{{ App\Constants\JobPosting::Salary[$jobPosting->salary] }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Job Description<h3>
                    <p>{{ $jobPosting->job_description }}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Welcome requirements<h3>
                    <p>{{ $jobPosting->welcome_requirements}}</p>
                    <h3 class="card-title display-5 mb-2 pl-1">Employee benefits<h3>
                    <p class="mb-4">{{ $jobPosting->employee_benefits }}</p>
                  </div>
                </div>
                <div class="like"></div>
                <div class="dislike"></div>
              </li>
            @endif
          @endforeach
        @endif
      </ul>
      <div class="noUser">There is no user around here</div>
    </div>
    <div class="actions" id="actionBtnArea">
      <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i></a>
      <a href="#" class="like"><i class="fas fa-heart fa-2x"></i></a>
    </div>
  </div>

  <script>
    var usersNum = {{ $userCount }};
    var from_user_id = {{ $from_user_id }};
  </script>

@endsection
