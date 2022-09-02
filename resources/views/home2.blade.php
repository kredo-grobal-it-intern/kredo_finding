<!-- home.blade.php first version -->
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
        <a href="{{ route('users.show', Auth::user()->id) }}">{{ profileImageInNav(Auth::user()->img_name) }}</a>
      </div>
      <span>
        <a href="{{ route('users.show', Auth::user()->id) }}" class="text-dark font-weight-bold">MyPage</a>
      </span>
    </nav>

    <div id="tinderslide">
      <ul>
        @if(!isWorker(Auth::id()))
          @foreach($users as $user)
            @if(!$user->isLiked())
              <li data-user_id="{{ $user->id }}">
                <div class="userName">{{ $user->name }}</div>
                {{ workerProfileImage($user->img_name) }}
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
                      {{ companyProfileImage($jobPosting->companyUser->img_name) }}
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




            <!-- 5 -->

 <!-- <div class="row no-gutters">
        <div class="card five col-3">
            <div class="card-header">
                <div class="avatar">
                  <a href="{{ route('users.show', $user->id) }}">{{ companyProfileImage($user->img_name) }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="bio">
                    <h3 class="name">{{ $user->name }}</h3>
                    <div class="intro">
                        <div class="h4 introtitle">Introduction</div>
                        <p class="introduction">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quas blanditiis autem rerum? Blanditiis distinctio, dolor ea</p>
                    </div>
                    <button class="btn btn-outline-secondary">...Read More</button>
                </div>
            </div>
            <div class="footer">
              <ul class="icon">
                  <li><a href=""><i class="far fa-heart"></i></a></li>
                  <li><a href=""><i class="fas fa-comment-dots"></i></a></li>
                  <li><a href=""><i class="fas fa-map-marker-alt"></i></a></li>
                  <li><a href=""><i class="fas fa-home"></i></a></li>
              </ul>
            </div>
        </div>
  </div> -->
<!-- </div>   -->




        <!-- 3 -->
  <!-- <div class="user-wrap three">
        <div class="user-list">
            <div class="avatar">
              <a href="{{ route('users.show', Auth::user()->id) }}">{{ profileImageInNav(Auth::user()->img_name) }}</a>
              <div class="heart">
                <i class="far fa-heart"></i>
              </div>
              <div class="icon">
                  <i class="fas fa-map-marker-alt">address</i>
                  <a href=""><i class="fas fa-comment-dots"></i>Message</a>
                  <a href="">Homepage</a>
              </div>
            </div>
            <div class="bio">
                <h4 class="name">Name Yamada</h4>
                <h4>Introduction</h4>
                <p class="introduction">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quas blanditiis autem rerum? Blanditiis distinctio, dolor ea</p>
                <button class="btn btn-outline-secondary">...Read More</button>
            </div>
        </div>
    </div>
  </div> -->

 