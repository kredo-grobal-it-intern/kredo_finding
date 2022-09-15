@extends('layouts.layout')

<div class="search_home w-100">
    <div class="search_header bg-primary text-white mb-5 p-3">
        <h1>Search for company</h1>
    </div>

    <form action="{{ route('home') }}" class="px-4">
        <div class="form-group row mt-2">
            <label for="preferred_country" class="col-sm-3 col-form-label">Country</label>
            <div class="col-sm-9">
                <select name="preferred_country" id="preferred_country" class="form-control">
                    <option></option>
                    @foreach ($countries as $country_code => $country_name)
                        <option value="{{ $country_code }}">{{ $country_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="preferred_state" class="col-sm-3 col-form-label">State</label>
            <div class="col-sm-9">
                <input type="text" name="state" id="preferred_state" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="preferred_city" class="col-sm-3 col-form-label">City</label>
            <div class="col-sm-9">
                <input type="text" id="preferred_state" name="city" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="occupation" class="col-sm-3 col-form-label">Occupation</label>
            <div class="col-sm-9">
                <select name="occupation" id="occupation" class="form-control">
                    <option></option>
                    @foreach (App\Constants\Occupation::Occupation as $occupation_id => $occupation_name)
                        <option value="{{ $occupation_id }}">{{ $occupation_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="industry" class="col-sm-3 col-form-label">Industry</label>
            <div class="col-sm-9">
                <select name="industry" id="industry" class="form-control">
                    <option></option>
                    @foreach (App\Constants\JobPosting::Industry as $industry_id => $industry_name)
                        <option value="{{ $industry_id }}">{{ $industry_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="employ_status" class="col-sm-3 col-form-label">Employment Status</label>
            <div class="col-sm-9">
                <select name="preferred_employment_status" id="employ_status" class="form-control">
                    <option></option>
                    @foreach (App\Constants\EmploymentStatus::EmploymentStatus as $employment_status_id => $employment_status_name)
                        <option value="{{ $employment_status_id }}">{{ $employment_status_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="tenureship" class="mb-0 col-sm-3 col-form-label">Salary</label>
            <div class="col-sm-9">
                <select name="salary" id="salary" class="form-control">
                    <option></option>
                    @foreach (App\Constants\JobPosting::Salary as $salary_id => $salary_name)
                        <option value="{{ $salary_id }}">{{ $salary_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="searchBtn_wrap">
            <button type="submit" class="btn searchBtn">Search</button>
        </div>
    </form>
</div>
