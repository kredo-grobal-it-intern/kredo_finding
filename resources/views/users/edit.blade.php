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
                <button type="submit" class="btn btn-danger btn-sm border border-0 mx-auto d-block"><i
                        class="fa-regular fa-trash-can"></i>Delete Image</button>
            </form>
        @endif
        <div class='container'>
            <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}"
                enctype="multipart/form-data">
                @csrf

                <label for="file_photo" class="rounded-circle userProfileImg">
                    <div class="userProfileImg_description">Upload Image</div>
                    @if ($user->img_name)
                        <img src="/storage/images/{{ $user->img_name }}" class="rounded-circle userProfileIcon">
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
