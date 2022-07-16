@extends('layouts.layout')

@section('content')
  <div class="companyEditPage">
    <header class="header">
      <div>Edit Company Infomation</div>
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

        <label for="file_photo" class="rounded-circle companyProfileImg">
          <div class="companyProfileImg_description">Upload Image</div>
          @if ($user->img_name)
            <img src="{{ $user->img_name }}" class="rounded-circle companyProfileIcon">
          @else
            <i class="fas fa-camera fa-3x"></i>
          @endif
          <input type="file" id="file_photo" name="img_name">
        </label>
        <div class="companyImgPreview" id="companyImgPreview">
          <img id="thumbnail" class="companyImgPreview_content" accept="image/*" src="">
          <p class="companyImgPreview_text">Uploaded Image</p>
        </div>

        <div class="form-group">
          <label>Company</label>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
          @error('name')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
          @error('email')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <a href="{{ route('changePasswordGet') }}">Change Password </a>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-6">
              <label>Address 1</label> <p class="text-danger d-inline">*</p>
              <input type="address" name="address1" class="form-control" value="{{ $user->address1 }}" {{ $user->address1 ? 'required' : '' }}>
            </div>
            <div class="col-6">
              <label>Address 2</label>
              <input type="address" name="address2" class="form-control" value="{{ $user->address2 }}" >
              @error('address2')
                <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label>City</label><p class="text-danger d-inline">*</p>
              <input type="text" name="city" class="form-control" value="{{ $user->city }}" {{ $user->city ? 'required' : '' }}>
              @error('city')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col">
              <label>State</label><p class="text-danger d-inline">*</p>
              <input type="text" name="state" class="form-control" value="{{ $user->state }}" {{ $user->state ? 'required' : '' }}>
              @error('state')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col">
              <label>Country</label><p class="text-danger d-inline">*</p>
              <input type="text" name="country" class="form-control" value="{{ $user->country }}" {{ $user->country ? 'required' : '' }}>
              @error('country')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col">
              <label>Zipcode</label><p class="text-danger d-inline">*</p>
              <input type="number" name="zipcode" class="form-control" value="{{ $user->zipcode }}" {{ $user->zipcode ? 'required' : '' }}>
              @error('zipcode')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="tel" name="contact_number" class="form-control" placeholder="Enter Contact Number" value="{{ $user->contact_number }}">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label>Establishment Year</label>
              <input type="month" name="establishment_year" class="form-control" value="{{ empty($user->company->establishment_year) ? '' : $user->company->establishment_year }}">
            </div>
            <div class="col">
              <label>President Name</label>
              <input type="text" name="president_name" class="form-control" value="{{ empty($user->company->president_name) ? '' : $user->company->president_name }}">
              @error('president_name')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col">
              <label>Number of Employees</label>
              <input type="number" name="total_personnel" class="form-control" value="{{ empty($user->company->total_personnel) ? '' : $user->company->total_personnel }}" min=1>
              @error('total_personnel')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col">
              <label>Capital</label>
              <input type="number" name="capital" class="form-control" value="{{ empty($user->company->capital) ? '' : $user->company->capital }}" min=1>
              @error('capital')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-3">
              <label>Gross Sales</label>
              <input type="number" name="gross_sales" class="form-control" value="{{ empty($user->company->gross_sales) ? '' : $user->company->gross_sales }}" min=1>
              @error('gross_sales')
                <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-3">
              <label>Average Age</label>
              <input type="number" name="average_age" class="form-control" value="{{ empty($user->company->average_age) ? '' : $user->company->average_age }}" min=1>
              @error('average_age')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-6">
              <label>Homepage URL</label>
              <input type="text" name="homepage_url" class="form-control" value="{{ empty($user->company->homepage_url) ? '' : $user->company->homepage_url }}">
              @error('homepage_url')
                  <span class="errorMessage">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>services</label>
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
