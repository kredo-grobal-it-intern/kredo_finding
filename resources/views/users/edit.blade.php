@extends('layouts.layout')

@section('content')
  @if(isWorker($user->id))
    <div class="userEditPage">
      <header class="header">
            <div>Edit Profile</div>
      </header>
      <div class="tab_wrap">
        <input id="tab1" type="radio" name="tab_btn" checked>
        <input id="tab2" type="radio" name="tab_btn">

        <div class="tab_area">
          <label class="tab1_label" for="tab1">User</label>
          <label class="tab2_label" for="tab2">Job</label>
        </div>

        <div class="panel_area">
          <div id="panel1" class="tab_panel">
            @if ($user->img_name)
            <form action="{{ route('users.delete', $user->id) }}" method="post">
                @csrf
                @method('delete')
              <button type="submit" class="btn btn-danger btn-sm border border-0 mx-auto d-block"><i class="fa-regular fa-trash-can"></i>Delete Image</button>
            </form>
            @endif
            <div class='container'>
            <form class="form mt-5" method="POST" action="/users/updateUser/{{ $user->id }}"
              enctype="multipart/form-data">
              @csrf
              @method('PATCH')

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
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" {{ $user->name ? 'required' : ''}}>
                @error('name')
                    <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" {{ $user->email ? 'required' : ''}}>
                @error('email')
                    <span class="errorMessage">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <!-- Change password -->
                <a href="{{ route('changePasswordGet') }}">Change Password </a>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label>Address 1</label> <p class="text-danger d-inline">*</p>
                    <input type="text" name="address1" class="form-control" value="{{ $user->address1 }}" {{ $user->address1 ? 'required' : ''}}>
                    </div>
                  <div class="col-6">
                    <label>Address 2</label>
                    <input type="text" name="address2" class="form-control" value="{{ $user->address2 }}" >
                    @error('address2')
                        <span class="errorMessage">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label>City</label><p class="text-danger d-inline">*</p>
                  <input type="text" name="city" class="form-control" value="{{ $user->city }}" {{ $user->city ? 'required' : ''}} >
                    @error('city')
                      <span class="errorMessage">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                  <label>State</label><p class="text-danger d-inline">*</p>
                <input type="text" name="state" class="form-control" value="{{ $user->state }}" {{ $user->state ? 'required' : ''}} >
                @error('state')
                    <span class="errorMessage">{{ $message }}</span>
                @enderror
                </div>
                <div class="col">
                    <label>Country</label><p class="text-danger d-inline">*</p>
                    <select class="form-control" name="country">
                      <option></option>
                      @foreach($countries as $country_code => $country_name)
                      <option value="{{ $country_code }}" @if($user->country == $country_code) selected @endif>{{ $country_name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Zipcode</label><p class="text-danger d-inline">*</p>
                  <input type="number" name="zipcode" class="form-control" value="{{ $user->zipcode }}" {{ $user->zipcode ? 'required' : ''}} >
                  @error('zipcode')
                      <span class="errorMessage">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group pt-4">
              <label>Contact Number</label>
              <input type="number" name="contact_number" class="form-control" placeholder="Enter Contact Number" value="{{ $user->contact_number }}">
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
          </div>
        </div>

          <div id="panel2" class="tab_panel">
            <form class="form mt-5" method="POST" action="/users/updateJob/{{ $user->id }}"
              enctype="multipart/form-data">
              @csrf
              @method('PATCH')

                <div class="form-group">
                 <label>Company Name</label>
                 <input type="text" name="company_name" class="form-control" value="{{ $user->company_name }}">
                 @error('company_name')
                     <span class="errorMessage">{{ $message }}</span>
                 @enderror
               </div>
               <div class="form-group pt-4">
                <label class="form-check-label">Occupation</label>
                <select class="form-control" name="occupation">
                  <option></option>
                  @foreach(App\Constants\Occupation::Occupation as $occupation_id => $occupation_name)
                    <option value="{{ $occupation_id }}" @if($user->occupation === $occupation_id) selected @endif>{{ $occupation_name }}</option>
                  @endforeach
                  </select>
               </div>
               <div class="form-group pt-4">
                <label class="form-check-label">Employment Status</label>
                <select class="form-control" name="preferred_employment_status">
                  <option></option>
                  @foreach(App\Constants\EmploymentStatus::EmploymentStatus as $employment_status_id => $employment_status_name)
                    <option value="{{ $employment_status_id }}" @if($user->preferred_employment_status === $employment_status_id) selected @endif>{{ $employment_status_name }}</option>
                  @endforeach
                  </select>
               </div>
               <div class="form-group pt-4">
                <label class="form-check-label">Job Position</label>
                <select class="form-control" name="job_position">
                  <option></option>
                  @foreach(App\Constants\JobPosition::JobPosition as $job_position_id => $job_position_name)
                    <option value="{{ $job_position_id }}" @if($user->job_position === $job_position_id) selected @endif>{{ $job_position_name }}</option>
                  @endforeach
                  </select>
               </div>
               <div class="form-group pt-4">
                <label class="form-check-label">Tenureship</label>
                <select class="form-control" name="tenureship">
                  <option></option>
                  @foreach(App\Constants\Tenureship::Tenureship as $tenureship_id => $tenureship_name)
                    <option value="{{ $tenureship_id }}" @if($user->tenureship == $tenureship_id) selected @endif>{{ $tenureship_name }}</option>
                  @endforeach
                  </select>
               </div>
               <div class="form-group pt-4">
                 <div class="row">
                   <div class="col-6">
                     <label class="form-check-label">Preferred Country</label>
                      <select class="form-control" name="preferred_country">
                        <option></option>
                        @foreach($countries as $country_code => $country_name)
                        <option value="{{ $country_code }}" @if($user->preferred_country == $country_code) selected @endif>{{ $country_name }}</option>
                        @endforeach
                      </select>
                   </div>
                   <div class="col-6">
                     <label class="form-check-label">Preferred State</label>
                     <input type="text" name="preferred_state" class="form-control" value="{{ $user->preferred_state }}" >
                     @error('preferred_state')
                         <span class="errorMessage">{{ $message }}</span>
                     @enderror
                   </div>
                 </div>
                 <div class="form-group pt-4">
                  <label>Job Skills</label>
                  <textarea class="form-control" name="job_skills" rows="3">{{ $user->job_skills }}</textarea>
                  @error('job_skills')
                      <span class="errorMessage">{{ $message }}</span>
                  @enderror
                </div>

              <div class="form-group">
                 <label>Job Experience</label>
                 <textarea class="form-control" name="job_experiences" rows="10">{{ $user->job_experiences }}</textarea>
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
    </div>
  @else
    @include('companies.edit')
  @endif
@endsection
