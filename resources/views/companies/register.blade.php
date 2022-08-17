@extends('layouts.layout')

@section('content')
  <div class="signupCompanyPage">
    <div class="row">
      <div class="companyImg col-5"></div>
      <div class="register col-7">
        <header>
          <div><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg" style="height: 3rem; width:3rem;"></a></div>
          <div><a href="{{ route('showAbout') }}">About Us</a></div>
          <div><a href="{{ route('faq') }}">FAQ</a></div>
          <div><a href="{{ route('contacts') }}">Contact Us</a></div>
        </header>

        <div class='container'>
          <div class="title">
            <h2>Create your account</h2>
            <div class="outside">
              <div class="button">
                <a href="{{ route('register') }}" class="btn btnA" onfocus="this.blur();">Personal</a>
                <a href="{{ route('company.register') }}" class="btn btnB" onfocus="this.blur();">Business</a>
              </div>
            </div>
          </div>

          <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_type" value="1">
            <p class=text-center>Avatar</p>
            <label for="file_photo" class="rounded-circle userProfileImg">
              <div class="userProfileImg_description">Upload Profile Image</div>
              <i class="fas fa-user fa-3x"></i>
              <input type="file" id="file_photo" name="img_name">
            </label>

            <div class="userImgPreview" id="userImgPreview">
              <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
              <p class="userImgPreview_text">Uploaded Profile Image</p>
            </div>

            <div class="row">
              <div class="form-group @error('name')has-error @enderror col">
                <label>Company Name<span style="color: red">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Kredo company" required>
                @error('name')
                  <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group @error('email')has-error @enderror col">
                <label>Email <span style="color: red">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="kredo@example.com" required>
                @error('email')
                  <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group @error('password')has-error @enderror col">
                <label>Password <span style="color: red">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Please enter at least 8 characters" required>
                @error('password')
                <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col">
                <label>Confirmation Password <span style="color: red">*</span></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirmation password" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-6">
                <label>Contact Number</label>
                <input type="tel" name="contact_number" class="form-control" placeholder="Phone number without hyphen" maxlength="11">
                @error('contact_number')
                  <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group @error('self_introduction')has-error @enderror">
              <label>Company Info <span style="color: red">*</span></label>
              <textarea class="form-control" name="self_introduction" rows="5" required>{{ old('self_introduction') }}</textarea>
              @error('self_introduction')
                <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn submitBtn">Register</button>
              <div class="linkToLogin">
                Already have an account?<a href="{{ route('login') }}">&nbsp;Sign in here!</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
