@extends('layouts.layout')

@section('content')
    <div class="usersList">
        <div class="nav">
            <div class="logo m-3">
                <a href="{{ route('home') }}">
                    <img src="/images/kredo_logo.jpg" width="50px" height="50px">
                </a>
            </div>
        </div>

        <div class="container-fluid">
            @if (!isWorker(Auth::id()))
                <h2>Users List of Workers</h2>
                <div class="userlist row">
                    @foreach ($users as $user)
                        <div class="card seven col-xl-3 col-lg-4 col-md-6 mt-4 p-1">
                            <div class="card-header">
                                <div class="avatar">
                                    <a href="{{ route('user_detail.show', $user->id) }}">
                                        {{ workerProfileImage($user->img_name) }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="bio">
                                    <h3 class="name">{{ $user->name }}</h3>
                                    <div class="intro">
                                        <h3 class="introtitle">Introduction</h3>
                                        <p class="introduction">{{ $user->self_introduction }}</p>
                                    </div>
                                    <a href="{{ route('user_detail.show', $user->id) }}">
                                        <button class="btn btn-outline-secondary">...Read More</button>
                                    </a>
                                </div>
                                <div class="footer mt-2">
                                    <ul class="icon">
                                        <li>
                                            @if ($user->isLiked())
                                                <form action="{{ route('dislike', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn likebtn">
                                                        <i class="fas fa-heart text-danger fa-lg"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn likebtn">
                                                        <i class="far fa-heart fa-lg"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                        <li><a href="#"><i class="fas fa-comment-dots"></i></a></li>
                                        <li><a href="#"><i class="fas fa-map-marker-alt"></i></a></li>
                                        <li><a href="#"><i class="fas fa-home"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">Last Updated&nbsp;<span
                                    class="small text-muted">{{ date('D, M d Y', strtotime($user->updated_at)) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-3">{{ $users->links() }}<div>
                    @else
                        <h2>Users List of Companies</h2>
                        <div class="row jobposting">
                            @foreach ($job_postings as $jobPosting)
                                <div class="card five col-xl-5 col-lg-5 col-md-4 m-3">
                                    <div class="title mt-3">
                                        <div class="occupation h3">
                                            {{ App\Constants\Occupation::Occupation[$jobPosting->occupation] }}
                                            <span class="status h5">
                                                {{ App\Constants\EmploymentStatus::EmploymentStatus[$jobPosting->employment_status] }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="avatar col-3">
                                                <a
                                                    href="#">{{ companyImageInUserlist($jobPosting->companyUser->img_name) }}</a>
                                            </div>
                                            <div class="location col-9">
                                                <h3 class="name">{{ $jobPosting->companyUser->name }}</h3>
                                                <div class="city"><i class="fas fa-map-marker-alt"></i>
                                                    {{ $jobPosting->city . ', ' . $jobPosting->state . ', ' . $countries[$jobPosting->country] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="jobinfo">
                                            <ul class="condtions mt-4">
                                                <li class="industry h6">Industry
                                                    <span>{{ App\Constants\JobPosting::Industry[$jobPosting->industry] }}</span>
                                                </li>
                                                <li class="h6 workhours">Working hours
                                                    <span>{{ $jobPosting->opening_time . ' ~ ' . $jobPosting->closing_time }}</span>
                                                </li>
                                                <li class="h6 salary">Salary
                                                    <span>{{ $jobPosting->salary }}</span>
                                                </li>
                                            </ul>
                                            <div class="intro">
                                                <h5 class=" introtitle">Job Description</h5>
                                                <p class="description">{{ $jobPosting->job_description }}
                                                </p>
                                                <a href="{{ route('company_detail.show', $jobPosting->company->id) }}">
                                                    <span class="btn btn-outline-info">...Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-3">{{ $job_postings->links() }}<div>
            @endif
        </div>
    </div>
@endsection
