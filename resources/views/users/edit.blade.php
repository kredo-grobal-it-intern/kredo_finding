@extends('layouts.layout')

@section('content')
    @if (isWorker($user->id))
        <div class="userEditPage">
            <header class="header">
                <div>Edit Profile</div>
            </header>
            <div class="tab_wrap">
                <input id="tab1" type="radio" name="tab_btn" checked style="display:none">
                <input id="tab2" type="radio" name="tab_btn" style="display:none">

                <div class="tab_area  mx-auto mt-3" style="width:96%;">
                    <label class="tab1_label" for="tab1">USER INFO</label>&nbsp;&nbsp;
                    <label class="tab2_label" for="tab2">JOB DETAILS</label>
                    <hr class="mt-0 text-secondary">
                </div>

                <div class="panel_area">
                    <div id="panel1" class="tab_panel">
                        @if ($user->img_name)
                            <form action="{{ route('users.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm border border-0 mx-auto d-block"><i
                                        class="fa-regular fa-trash-can"></i>Delete Image</button>
                            </form>
                        @endif
                        <div class='container'>
                          <div class="edit_form" style="width:100%;height:387px;border:1px solid #000; border-radius:20px;">
                            <form class="form mt-3" method="POST" action="/users/{{ $user->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                  <div class="col-md-4" id="image">
                                    <label for="file_photo" class="userProfileImg">
                                      <div class="userProfileImg_description">Upload Image</div>
                                      @if ($user->img_name)
                                          <img src="{{ $user->img_name }}" class="rounded-circle userProfileIcon">
                                      @else
                                          <img src="/images/vector.png" alt="" class="user-profile" >
                                      @endif
                                      <input type="file" id="file_photo" name="img_name">
                                    </label>
                                    <div class="userImgPreview" id="userImgPreview">
                                        <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
                                        <p class="userImgPreview_text">Uploaded Image</p>
                                    </div>
                                  </div>

                                  <div class="col-md-8 p-0" id="middle">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-left">{{$user->name}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="email" class="form-label">Email :</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" style="border:none;" value="{{ $user->email }}"
                                                {{ $user->email ? 'required' : '' }}>
                                                @error('email')
                                                    <span class="errorMessage">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="contact_number" cclass="form-label">Contact Number :</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="contact_number" id="contact_number" style="border:none;" class="form-control"
                                                placeholder="Enter Contact Number" value="{{ $user->contact_number }}">
                                        </div>
                                        <div class="col-md-4">
                                        <button type="submit" class="btn btn-success" style="border-radius:20px; width:209px;">ACTIVATE</button>
                                        </div>
                                    </div>

                                      <div class="form-group pt-2">
                                        <label class="form-lbel">Gender :</label>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" name="gender" style="border:none;" value="0"
                                                type="radio" id="inlineRadio1"
                                                @if ($user->gender === App\Constants\UserConstants::MALE) checked @endif>
                                            <label class="form-check-label" for="inlineRadio1">male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="gender" value="1"
                                                type="radio" id="inlineRadio2"
                                                @if ($user->gender === App\Constants\UserConstants::FEMALE) checked @endif>
                                            <label class="form-check-label" for="inlineRadio2">female</label>
                                        </div>
                                      </div>

                                      <div class="">
                                        <button type="submit" class="btn btn-info text-white" style="width:126px; margin:0 5%">edit</button>
                                        <button type="submit" class="btn btn-success" style="width:126px;">save</button>
                                      </div>
                                    </div>
                                    <div class="col" id="button">
                                      <form action="">
                                        
                                      </form>
                                    </div>
                                  </div>
                            </form>
                          </div>

                          <div class="add_details">
                            <div class="form-group">
                              <div class="address">
                                <h5 class="mt-4 mb-1">ADDRESS</h5>
                                <hr class="mt-0 text-secondary">
                                <div class="row">
                                  <div class="col-6">
                                      <input type="text" name="address1" class="form-control" placeholder="Address 1"
                                          value="{{ $user->address1 }}" {{ $user->address1 ? 'required' : '' }}>
                                  </div>
                                  <div class="col-6">
                                      <input type="text" name="address2" class="form-control" placeholder="Address 2"
                                          value="{{ $user->address2 }}">
                                      @error('address2')
                                          <span class="errorMessage">{{ $message }}</span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col">
                                      <input type="text" name="city" class="form-control" placeholder="City"
                                          value="{{ $user->city }}" {{ $user->city ? 'required' : '' }}>
                                      @error('city')
                                          <span class="errorMessage">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="col">
                                      <input type="text" name="state" class="form-control" placeholder="State"
                                          value="{{ $user->state }}" {{ $user->state ? 'required' : '' }}>
                                      @error('state')
                                          <span class="errorMessage">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="col">
                                      <select class="form-control" name="country">
                                          <option style="display:none;" class="gray" >Country</option>
                                          @foreach ($countries as $country_code => $country_name)
                                              <option value="{{ $country_code }}"
                                                  @if ($user->country == $country_code) selected @endif>
                                                  {{ $country_name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col">
                                      <input type="number" name="zipcode" class="form-control" placeholder="Zipcode"
                                          value="{{ $user->zipcode }}" {{ $user->zipcode ? 'required' : '' }}>
                                      @error('zipcode')
                                          <span class="errorMessage">{{ $message }}</span>
                                      @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="self_introduction">
                            <div class="form-group">
                              <h5 class="mt-4 mb-1">SELF INTRODUCTION</h5>
                              <hr class="mt-0 text-secondary">
                              <textarea class="form-control" name="self_introduction" rows="10">{{ $user->self_introduction }}</textarea>
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn submitBtn">Update</button>
                            </div>
                            <div class="text-center mt-2">
                              <button type="button" onclick="history.back()"
                                  class="btn backBtn">Back</button>
                            </div>
                          </div>

                          <div class="account">
                            <div class="form-group">
                                <h5 class="mt-4 mb-1"></h5>
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
                        <input type="text" name="company_name" class="form-control"
                            value="{{ $user->company_name }}">
                        @error('company_name')
                            <span class="errorMessage">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group pt-4">
                        <label class="form-check-label">Occupation</label>
                        <select class="form-control" name="occupation">
                            <option></option>
                            @foreach (App\Constants\Occupation::Occupation as $occupation_id => $occupation_name)
                                <option value="{{ $occupation_id }}" @if ($user->occupation === $occupation_id) selected @endif>
                                    {{ $occupation_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pt-4">
                        <label class="form-check-label">Employment Status</label>
                        <select class="form-control" name="preferred_employment_status">
                            <option></option>
                            @foreach (App\Constants\EmploymentStatus::EmploymentStatus as $employment_status_id => $employment_status_name)
                                <option value="{{ $employment_status_id }}"
                                    @if ($user->preferred_employment_status === $employment_status_id) selected @endif>{{ $employment_status_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pt-4">
                        <label class="form-check-label">Job Position</label>
                        <select class="form-control" name="job_position">
                            <option></option>
                            @foreach (App\Constants\JobPosition::JobPosition as $job_position_id => $job_position_name)
                                <option value="{{ $job_position_id }}" @if ($user->job_position === $job_position_id) selected @endif>
                                    {{ $job_position_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pt-4">
                        <label class="form-check-label">Tenureship</label>
                        <select class="form-control" name="tenureship">
                            <option></option>
                            @foreach (App\Constants\Tenureship::Tenureship as $tenureship_id => $tenureship_name)
                                <option value="{{ $tenureship_id }}" @if ($user->tenureship == $tenureship_id) selected @endif>
                                    {{ $tenureship_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pt-4">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label">Preferred Country</label>
                                <select class="form-control" name="preferred_country">
                                    <option></option>
                                    @foreach ($countries as $country_code => $country_name)
                                        <option value="{{ $country_code }}"
                                            @if ($user->preferred_country == $country_code) selected @endif>{{ $country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-check-label">Preferred State</label>
                                <input type="text" name="preferred_state" class="form-control"
                                    value="{{ $user->preferred_state }}">
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
