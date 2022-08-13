@extends('layouts.layout')

@section('content')
<div class="usershowPage">
  <div class="myPageIcon">
    @if (Auth::user()->img_name)
        <a href="{{ route('profile.show', Auth::user()->id) }}"><img src="{{ Auth::user()->img_name }}"></a>
      @else
      @if (Auth::user()->user_type == 0)
        <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fa-solid fa-circle-user"></i></a>
      @else
        <a href="{{ route('profile.show', Auth::user()->id) }}"><i class="fas fa-building fa-2x"></i></a>
      @endif
    @endif
    <p>Hi,&nbsp;{{ $user->name }}</p>
  </div>

  <div class="profile">
    <div class='userInfo_img'>
      @if($user->img_name)
        <img src="{{ $user->img_name }}">
      @else
        <i class="{{ $user->user_type === App\Constants\UserType::Worker ? 'fa-solid fa-circle-user' : 'fa-solid fa-circle-user' }}"></i>
      @endif
    </div>
    <a class="btn editBtn" href="/users/edit/{{ $user->id }}" role="button">Edit</a>

    <div class="row">
      <div class="col">
        <p>Name</p>
        <div class="border">{{ $user->name }}</div>
      </div>
      <div class="col">
        <p>Email</p>
        <div class="border">{{ $user->email }}</div>
      </div>
      <div class="col">
        <p>Password</p>
        <div class="border">********</div>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <p>Contact Number</p>
        <div class="border">{{ $user->contact_number }}</div>
      </div>
      <div class="col-4">
        <p>Gender</p>
        <div class="border">
          @if(isWorker(Auth::id()))
            @if ($user->gender === 0)
              <div class="form-check" for="inlineRadio1">male</div>
            @elseif($user->gender === 1)
              <div class="form-check" for="inlineRadio2">female</div>
            @else
              <div class="form-check" for="inlineRadio2">not entered</div>
            @endif
          @endif
        </div>
      </div>
    </div>
          
    <div class="row">
      <div class="col">
        <p>{{ $user->user_type === App\Constants\UserType::Worker ? 'Introduction' : 'Services' }}</p>
        <div class="border textarea">{{ $user -> self_introduction }}</div>
      </div>       
    </div> 
  </div>
</div>
@endsection