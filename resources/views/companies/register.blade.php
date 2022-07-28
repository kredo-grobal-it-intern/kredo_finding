@extends('layouts.layout')

@section('content')
  <div class="signupCompanyPage">
    <header class="header">
      <div>Create new account</div>
    </header>
    <div class="text-right pt-2">
      <button type="button" onclick="history.back()" class="btn backBtn">Back</button>
    </div>
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
          <label>Company <span style="color: red">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your name" required>
          @error('name')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group @error('email')has-error @enderror">
          <label>Email <span style="color: red">*</span></label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email address" required>
          @error('email')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group @error('password')has-error @enderror">
          <label>Password <span style="color: red">*</span></label>
          <em>(Please enter at least 8 characters)</em>
          <input type="password" name="password" class="form-control" placeholder="Enter password" required>
          @error('password')
           <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Confirmation Password <span style="color: red">*</span></label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirmation password" required>
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="tel" name="contact_number" class="form-control" placeholder="Enter Contact Number" maxlength="11">
          @error('contact_number')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group @error('self_introduction')has-error @enderror">
          <label>Company Info <span style="color: red">*</span></label>
          <textarea class="form-control" name="self_introduction" rows="10" required>{{ old('self_introduction') }}</textarea>
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
