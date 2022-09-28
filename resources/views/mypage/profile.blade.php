@extends('layouts.layout')

@section('content')
    <div class="usershowPage">
        <div class="myPageIcon">
            @if (Auth::user()->img_name)
                <a href="{{ route('users.show', Auth::user()->id) }}"><img src="{{ Auth::user()->img_name }}"></a>
            @else
                @if (isWorker(Auth::id()))
                    <a href="{{ route('users.show', Auth::user()->id) }}"><i class="fa-solid fa-circle-user"></i></a>
                @else
                    <a href="{{ route('users.show', Auth::user()->id) }}"><i class="fas fa-building fa-2x"></i></a>
                @endif
            @endif
            <p>Hi,&nbsp;{{ $user->name }}</p>
        </div>

        <div class="profile">
            <div class='userInfo_img'>
                @if ($user->img_name)
                    <img src="{{ $user->img_name }}">
                @else
                    <i class="{{ isWorker(Auth::id()) ? 'fa-solid fa-circle-user' : 'fa-solid fa-building p-3' }}"></i>
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
                    <div class="border">
                        <div>{{ ($user->contact_number) ? $user->contact_number : '-' }}</div>
                    </div>
                </div>
                @if (isWorker(Auth::id()))
                    <div class="col-4">
                        <p>Gender</p>
                        <div class="border">
                            @if ($user->gender === 0)
                                <div class="form-check" for="inlineRadio1">male</div>
                            @elseif($user->gender === 1)
                                <div class="form-check" for="inlineRadio2">female</div>
                            @else
                                <div class="form-check" for="inlineRadio2">not entered</div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col">
                    <p>Address1</p>
                    <div class="border">{{ ($user->address1) ? $user->address1 : '-' }}</div>
                </div>
                <div class="col">
                    <p>Address2</p>
                    <div class="border">{{ ($user->address2) ? $user->address2 : '-' }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>City</p>
                    <div class="border">{{ ($user->city) ? $user->city : '-' }}</div>
                </div>
                <div class="col">
                    <p>State</p>
                    <div class="border">{{ ($user->state) ? $user->state : '-' }}</div>
                </div>
                <div class="col">
                    <p>Country</p>
                    <div class="border">{{ ($user->country) ? $user->country : '-' }}</div>
                </div>
                <div class="col">
                    <p>Zip code</p>
                    <div class="border">{{ ($user->zipcode) ? $user->zipcode : '-' }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>{{ $user->user_type === App\Constants\UserType::Worker ? 'Introduction' : 'Services' }}</p>
                    <div class="border textarea">{{ $user->self_introduction }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
