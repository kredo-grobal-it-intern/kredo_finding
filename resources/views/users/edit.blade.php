@extends('layouts.layout')

@section('content')
    <div class="userEditPage">
        <header class="header">
            <div>Edit Profile</div>
        </header>
        @if ($user->img_name)
            <form action="{{ route('users.delete', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm border border-0 mx-auto d-block"><i class="fa-regular fa-trash-can"></i>Delete Image</button>
            </form>
        @endif
        <div class='container'>
            <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}"
                enctype="multipart/form-data">
                @csrf

                <label for="file_photo" class="rounded-circle userProfileImg">
                    <div class="userProfileImg_description">Upload Image</div>
                    @if ($user->img_name)
                        <img src="{{ $user->img_name }}" class="rounded-circle userProfileIcon">
                    @else
                        <i class="fas fa-camera fa-3x"></i>
                    @endif
                    <input type="file" id="file_photo" name="img_name">
                </label>
                <div class="userImgPreview" id="userImgPreview">
                    <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
                    <p class="userImgPreview_text">Uploaded Image</p>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <span class="errorMessage">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                        <span class="errorMessage">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <div class="row pt-3"><p class="text-danger d-inline">*once the address is filled, you never change them. </p></div>
                  <div class="row">
                    <div class="col-6">
                      <label>Address 1</label><p class="text-danger d-inline">*</p>
                      <input type="address" name="address1" class="form-control" value="{{ $user->address1 }}" >
                      <input type="hidden" name="old_address1" class="form-control" value="{{ $user->address1 }}" >
                    </div>
                      <div class="col-6">
                        <label>Address 2</label>
                    <input type="address" name="address2" class="form-control" value="{{ $user->address2 }}" >
                    @error('address2')
                        <span class="errorMessage">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label>City</label><p class="text-danger d-inline">*</p>
                    <input type="text" name="city" class="form-control" value="{{ $user->city }}" >
                    <input type="hidden" name="old_city" class="form-control" value="{{ $user->city }}" >
                    </div>
                    <div class="col">
                      <label>State</label><p class="text-danger d-inline">*</p>
                    <input type="text" name="state" class="form-control" value="{{ $user->state }}" >
                    <input type="hidden" name="old_state" class="form-control" value="{{ $user->state }}" >
                    </div>
                    <div class="col">
                        <label>Country</label><p class="text-danger d-inline">*</p>
                      <input type="text" name="country" class="form-control" value="{{ $user->country }}" >
                      <input type="hidden" name="old_country" class="form-control" value="{{ $user->country }}" >
                    </div>
                    <div class="col">
                        <label>Zipcode</label><p class="text-danger d-inline">*</p>
                      <input type="number" name="zipcode" class="form-control" value="{{ $user->zipcode }}" >
                      <input type="hidden" name="old_zipcode" class="form-control" value="{{ $user->zipcode }}" >
                  </div>
              </div>
                 <div class="form-group pt-4">
                  <div><label>Gender</label></div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="gender" value="0" type="radio" id="inlineRadio1"
                          @if ($user->gender === 0) checked @endif>
                      <label class="form-check-label" for="inlineRadio1">male</label>
                   </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" name="gender" value="1" type="radio" id="inlineRadio2"
                          @if ($user->gender === 1) checked @endif>
                      <label class="form-check-label" for="inlineRadio2">female</label>
                  </div>
                </div>
                <div class="form-group">
                    <label>Self Introduction</label>
                    <textarea class="form-control" name="self_introduction" rows="10">{{ $user->self_introduction }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn submitBtn">Update</button>
                </div>
                <div class="text-center mt-2">
                    <button type="button" onclick="history.back()" class="btn backBtn">Back</button>
                </div>
            </form>
        </div>
    </div>
@endsection
