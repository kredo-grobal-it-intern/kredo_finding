@extends('layouts.layout')

@section('content')
  <div class="signupPage">
    <header class="header">
      <div>Create new account</div>
    </header>
    <div class='container'>
      <form class="form mt-5" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <label for="file_photo" class="rounded-circle userProfileImg">
          <div class="userProfileImg_description">Upload Profile Image</div>
          <i class="fas fa-camera fa-3x"></i>
          <input type="file" id="file_photo" name="img_name">
        </label>

        <div class="userImgPreview" id="userImgPreview">
          <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
          <p class="userImgPreview_text">Uploaded Profile Image</p>
        </div>

        <div class="form-group @error('name')has-error @enderror">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your name">
          @error('name')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group @error('email')has-error @enderror">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email address">
          @error('email')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group @error('password')has-error @enderror">
          <label>Password</label>
          <em>(Please enter at least 8 characters)</em>
          <input type="password" name="password" class="form-control" placeholder="Enter password">
          @error('password')
           <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Confirmation Password</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirmation password">
        </div>
        <div class="form-group">
          <div><label>Gender</label></div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="gender" value="0" type="radio" id="inlineRadio1">
            <label class="form-check-label" for="inlineRadio1">male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="gender" value="1" type="radio" id="inlineRadio2">
            <label class="form-check-label" for="inlineRadio2">female</label>
          </div>
        </div>
        <div class="form-group @error('self_introduction')has-error @enderror">
          <label>Self Introduction</label>
          <textarea class="form-control" name="self_introduction" rows="10">{{ old('self_introduction') }}</textarea>
          @error('self_introduction')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="text-center">
        <button type="submit" class="btn submitBtn">Register</button>
        <a href="{{ route('google.redirect') }}">
          <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" class="d-block mx-auto mt-3">
        </a>
        <div class="linkToLogin">
          <a href="{{ route('login') }}">Log in</a>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
