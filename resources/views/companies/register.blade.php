@extends('layouts.layout')

@section('content')
  <div class="signupCompanyPage">
    <header class="header">
      <div>Create new account</div>
    </header>
    <div class='container'>
      <form class="form mt-5" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_type" value="1">

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
          <label>Company</label>
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
        <div class="form-group @error('self_introduction')has-error @enderror">
          <label>Company Info</label>
          <textarea class="form-control" name="self_introduction" rows="10">{{ old('self_introduction') }}</textarea>
          @error('self_introduction')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="text-center">
          <button type="submit" class="btn submitBtn">Register</button>
          <div class="linkToLogin">
            <a href="{{ route('login') }}">Log in</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
