@extends('layouts.layout')

@section('content')
    <div class="container mt-5" style="background-color: #F4F7FC">
        <div class="col-10 mx-auto">
            <h2 class="text-center mb-5 display-4">Job Posting</h2>
            <form action="{{ route('posting.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row mb-3">
                    <div class="col-4">
                        <label for="occupation" class="form-label fw-bold">Occupation</label>
                        <p class="text-danger d-inline">*</p>
                        <select name="occupation" id="occupation" class="form-control" aria-label="Default select example"
                            value="{{ old('occupation') }}">
                            <option selected disabled>Select Occupation</option>
                            @foreach (App\Constants\Occupation::Occupation as $occupation_id => $occupation_name)
                                <option value="{{ $occupation_id }}" @if (old('occupation') == $occupation_id) selected @endif>
                                    {{ $occupation_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('occupation')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="industry" class="form-label fw-bold">Industry</label>
                        <p class="text-danger d-inline">*</p>
                        <select name="industry" id="industry" class="form-control">
                            <option selected disabled>Select Industry</option>
                            @foreach (App\Constants\JobPosting::Industry as $industry_id => $industry_name)
                                <option value="{{ $industry_id }}" @if (old('industry') == $industry_id) selected @endif>
                                    {{ $industry_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('industry')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="employment_status" class="form-label fw-bold">Employment Status</label>
                        <p class="text-danger d-inline">*</p>
                        <select name="employment_status" id="employment_status" class="form-control"
                            value="{{ old('employment_status') }}">
                            <option selected disabled>Select Employment Status</option>
                            @foreach (App\Constants\EmploymentStatus::EmploymentStatus as $employment_status_id => $employment_status)
                                <option value="{{ $employment_status_id }}"
                                    @if (old('employment_status') == $employment_status_id) selected @endif>
                                    {{ $employment_status }}
                                </option>
                            @endforeach
                        </select>
                        @error('employment_status')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-4">
                        <label for="city" class="form-label fw-bold">City</label>
                        <p class="text-danger d-inline">*</p>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                        @error('city')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="state" class="form-label fw-bold">State</label>
                        <p class="text-danger d-inline">*</p>
                        <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                        @error('state')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="country" class="form-label fw-bold">Country</label>
                        <p class="text-danger d-inline">*</p>
                        <select name="country" id="country" class="form-control" value="{{ old('country') }}">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country_code => $country_name)
                                <option value="{{ $country_code }}" @if (old('country') == $country_code) selected @endif>
                                    {{ $country_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-4">
                        <label for="opening_time" class="form-label fw-bold">Opening Time</label>
                        <input type="time" name="opening_time" class="form-control" value="{{ old('opening_time') }}">
                    </div>
                    <div class="col-4">
                        <label for="closing_time" class="form-label fw-bold">Closing Time</label>
                        <input type="time" name="closing_time" class="form-control" value="{{ old('closing_time') }}">
                    </div>
                    <div class="col-4">
                        <label for="salary" class="form-label fw-bold">Salary</label>
                        <p class="text-danger d-inline">*</p>
                        <select name="salary" id="salary" class="form-control">
                            <option selected disabled>Select Salary</option>
                            @foreach (App\Constants\JobPosting::Salary as $salary_id => $salary)
                                <option value="{{ $salary_id }}" @if (old('salary') == $salary_id) selected @endif>
                                    {{ $salary }}
                                </option>
                            @endforeach
                        </select>
                        @error('salary')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="job_description" class="form-label fw-bold">Job Description</label>
                    <p class="text-danger d-inline">*</p>
                    <textarea name="job_description" id="job_description" rows="3" class="form-control">
                        {{ old('job_description') }}
                    </textarea>
                    @error('job_description')
                        <p class="text-danger small mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="welcome_requirements" class="form-label fw-bold">Welcome Requirements</label>
                    <p class="text-danger d-inline">*</p>
                    <textarea name="welcome_requirements" id="welcome_requirements" rows="3" class="form-control">
                        {{ old('welcome_requirements') }}
                    </textarea>
                    @error('welcome_requirements')
                        <p class="text-danger small mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="employee_benefits" class="form-label fw-bold">Employee Benefits</label>
                    <textarea name="employee_benefits" id="employee_benefits" rows="3" class="form-control">
                        {{ old('employee_benefits') }}
                    </textarea>
                    @error('employee_benefits')
                        <p class="text-danger small mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row justify-content-center mb-5">
                    <button type="submit" class="btn text-white px-5" style="background-color: #f3920b;">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
