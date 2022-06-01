@extends('layouts.layout')

@section('content')
  <div class="signupPage">
    <header class="header">
      <div>Edit Profile</div>
    </header>

    <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
      @csrf

      @error('email')
      <span class="errorMessage">
        {{ $message }}
    </span>
      @enderror

      <label for="file_photo" class="rounded-circle userProfileImg">
        <div class="userProfileImg_description">Upload Image</div>
        <i class="fas fa-camera fa-3x"></i>
        <input type="file" id="file_photo" name="img_name">

      </label>
      <div class="userImgPreview" id="userImgPreview">
        <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
        <p class="userImgPreview_text">Uploaded Image</p>
      </div>
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">

      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
      </div>
      <div class="form-group">
        <div><label>Gender</label></div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="gender" value="0" type="radio" id="inlineRadio1" @if($user->gender === 0) checked @endif>
          <label class="form-check-label" for="inlineRadio1">male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="gender" value="1" type="radio" id="inlineRadio2" @if($user->gender === 1) checked @endif>
          <label class="form-check-label" for="inlineRadio2">female</label>
        </div>
      </div>
      <div class="form-group">
        <label>Self Introduction</label>
        <textarea class="form-control" name="self_introduction" rows="10">{{$user->self_introduction}}
        </textarea>
      </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn submitBtn">Update</button>
  </div>
  </form>
  </div>
  </div>
@endsection

