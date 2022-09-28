@extends('layouts.layout')

@section('content')

    @guest
        <div class="contact_us">
            <div class="contact_top my-4">
                <div class="row">
                    <div class="col-5 px-5">
                        <a href="{{ route('home') }}">
                            <img src="/images/kredo_logo.jpg" style="height: 2.5rem; width:2.5rem;">
                        </a>
                    </div>
                    <div class="col px-0">
                        <p style="font-size:18px; font-weight:700; font-family:'Inter'; line-height:22px; color:#000000;">CONTACT
                            US</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="contact_content mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 offset-md-3">
                        <p
                            style="font-weight:100; font-size:30px; line-height:36px; font-family:'Inter'; color:#000000; font-style:normal;">
                            Have some questions?</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-md-4 offset-md-1">
                        <img src="/images/mail.png" alt="height:150px; width:150px;">
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('contact.confirm') }}" method="post">
                            @csrf

                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" name="first_name" id="first_name" placeholder="first name"
                                class="form-control mb-3" value="{{ old('first_name') }}" required>

                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" name="last_name" id="last_name" placeholder="last name"
                                class="form-control mb-3" value="{{ old('last_name') }}" required>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="email" name="email" id="email" placeholder="email" class="form-control mb-3"
                                value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                                {{ Auth::check() ? 'readonly' : 'required' }}>

                            @error('inquiry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea name="inquiry" id="inquiry" cols="100" row="10" class="form-control contact-inquiry mb-3"
                                placeholder="Enter your question..." required>{{ old('inquiry') }}</textarea>

                            <button type="submit" class="w-100 text-white border border-none"
                                style="background-color: #FAAC64; font-size:22px; line-height:27px; font-weight:500;">SEND
                                MESSAGE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth
        <div class="row">
            <div class="col-3 sideBar">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"
                            style="height: 5rem; width:5rem;"></a>
                </div>
                <p class="menu font-weight-bold">Main Menu</p>
                <div class="list-group">
                    <a href="{{ route('users.show', Auth::user()->id) }}"
                        class="{{ request()->is('users/mypage/show/*') ? 'active' : '' }} sideBarItem">
                        {{ profileImageInMypage() }}
                        <span class="font-weight-bold">PROFILE</span>
                    </a>
                    <a href="{{ route('reaction.show') }}"
                        class="{{ request()->is('mypage/reaction') ? 'active' : '' }} sideBarItem">
                        <i class="fas fa-heart"></i>
                        <span class="font-weight-bold">LIKE</span>
                    </a>
                    <a href="{{ route('reaction.showDisliked') }}"
                        class="{{ request()->is('mypage/reaction/showDisliked') ? 'active' : '' }} sideBarItem">
                        <i class="fa-solid fa-heart-crack"></i>
                        <span class="font-weight-bold">DisLIKE</span>
                    </a>
                    <a href="{{ route('matching') }}"
                        class="{{ request()->is('mypage/matching') ? 'active' : '' }} sideBarItem">
                        <i class="fas fa-comment-dots"></i>
                        <span class="font-weight-bold">MESSAGES</span>
                    </a>
                    
                    <a href="{{ route('contact.show') }}" 
                        class="{{ request()->is('contact') ? 'active' : '' }} sideBarItem">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="font-weight-bold">CONTACT</span>
                    </a>

                    @if (!isWorker(Auth::id()))
                        <a href="{{ route('posting.create') }}"
                            class="{{ request()->is('mypage/create/posting') ? 'active' : '' }} sideBarItem">
                            <i class="fas fa-file-circle-plus"></i>
                            <span class="font-weight-bold">Job Posting</span>
                        </a>
                    @endif
                    <a href="{{ route('logout') }}" class="sideBarItem"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="fas fa-door-open logout-hover"></i>
                        <span class="font-weight-bold">LOGOUT</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </div>
            </div>
            <div class="col-9 contact_us">
                    <div class="contact_top my-4">
                            <!-- <div class="col-5 px-5">
                                <a href="{{ route('home') }}">
                                    <img src="/images/kredo_logo.jpg" style="height: 2.5rem; width:2.5rem;">
                                </a>
                            </div> -->
                            <div class="text-center">
                                <p style="font-size:18px; font-weight:700; font-family:'Inter'; line-height:22px; color:#000000;">CONTACT
                                    US</p>
                            </div>
                    </div>

                    <hr>

                <div class="contact_content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 offset-md-3">
                            <p
                                style="font-weight:100; font-size:30px; line-height:36px; font-family:'Inter'; color:#000000; font-style:normal;">
                                Have some questions?</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-4 offset-md-1">
                            <img src="/images/mail.png" alt="height:150px; width:150px;">
                        </div>
                        <div class="col-md-3">
                            <form action="{{ route('contact.confirm') }}" method="post">
                                @csrf

                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="first_name" id="first_name" placeholder="first name"
                                    class="form-control mb-3" value="{{ old('first_name') }}" required>

                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="last_name" id="last_name" placeholder="last name"
                                    class="form-control mb-3" value="{{ old('last_name') }}" required>

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <input type="email" name="email" id="email" placeholder="email" class="form-control mb-3"
                                    value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                                    {{ Auth::check() ? 'readonly' : 'required' }}>

                                @error('inquiry')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="inquiry" id="inquiry" cols="100" row="10" class="form-control contact-inquiry mb-3"
                                    placeholder="Enter your question..." required>{{ old('inquiry') }}</textarea>

                                <button type="submit" class="w-100 text-white border border-none"
                                    style="background-color: #FAAC64; font-size:22px; line-height:27px; font-weight:500;">SEND
                                    MESSAGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection
