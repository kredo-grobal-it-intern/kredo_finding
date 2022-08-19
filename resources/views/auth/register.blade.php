@extends('layouts.layout')

@section('content')
  <div class="signupPage">
    <div class="column image"></div>
    <div class="column register">
      <header>
        <div><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg" style="height: 3rem; width:3rem;"></a></div>
        <div><a href="{{ route('showAbout') }}">About Us</a></div>
        <div><a href="{{ route('faq') }}">FAQ</a></div>
        <div><a href="{{ route('contact.show') }}">Contact Us</a></div>
      </header>

      <div class='container'>
        <div class="title">
          <h2>Create your account</h2>
          <div class="outside">
            <div class="button">
              <a href="#" class="btn btnA text-center" onfocus="this.blur();">Personal</a>
              <a href="{{ route('company.register') }}" class="btn btnB" onfocus="this.blur();">Business</a>
            </div>
          </div>
        </div>
        <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="user_type" value=0>
          <p class=text-center>Avatar</p>
          <label for="file_photo" class="rounded-circle userProfileImg">
          <div class="userProfileImg_description">Upload Profile Image</div>
          <i class="fas fa-user fa-3x"></i>
          <input type="file" id="file_photo" name="img_name">
          </label>

          <div class="userImgPreview" id="userImgPreview">
            <img id="thumbnail" class="userImgPreview_content rounded-circle" accept="image/*" src="">
          </div>

          <div class="row">
            <div class="form-group @error('name')has-error @enderror col">
              <label>Name <span style="color: red">*</span></label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="John Smith" required>
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
            <div class="form-group col">
              <label>Contact Number</label>
              <input type="tel" name="contact_number" class="form-control" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" placeholder="Phone number without hyphen" maxlength="11">
              @error('contact_number')
              <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group col">
              <div><label>Gender</label></div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="gender" value="0" type="radio" id="inlineRadio1">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="gender" value="1" type="radio" id="inlineRadio2">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
            </div>
          </div>

          <div class="form-group @error('self_introduction')has-error @enderror">
            <label>Self Introduction <span style="color: red">*</span></label>
            <textarea class="form-control" name="self_introduction" rows="5" required>{{ old('self_introduction') }}</textarea>
            @error('self_introduction')
              <span class="errorMessage">{{ $message }}</span>
            @enderror
          </div>

          <div class="text-center">
            <button type="submit" class="btn submitBtn">Create Account</button>
            <p class="line">or</p>
          </div>
          <div class="row">
            <div class="col snsIcons">
              <a href="{{ route('google.redirect') }}"><img src="/images/google.png" alt=""><span class="snsSignup">Sign up with Google</span></a>
            </div>
            <div class="col snsIcons">
              <a href="{{ route('facebook.redirect') }}"><img src="/images/facebook.png" alt=""><span class="snsSignup">Sign up with Facebook</span></a>
            </div>
          </div>
          <div class="linkToLogin">
              Already have an account?<a href="{{ route('login') }}">&nbsp;Sign in here!</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
