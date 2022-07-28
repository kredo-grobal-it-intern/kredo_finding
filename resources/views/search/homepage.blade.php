@extends('layouts.layout')

<div class="search_home w-100">
  <div class="search_header bg-dark text-white mb-5 p-3">
    <h1>Search for employees</h1>
  </div>

  <form action="" class="px-4">
    <div class="form-group row mt-2">
      <label for="preferred_country" class="col-sm-3 col-form-label">Country</label>
      <div class="col-sm-9">
        <select name="" id="preferred_country" class="form-control">
          <option value=""></option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="preferred_state" class="col-sm-3 col-form-label">State</label>
      <div class="col-sm-9">
        <input type="text" id="preferred_state" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label for="occupation" class="col-sm-3 col-form-label">Occupation</label>
      <div class="col-sm-9">
        <select name="" id="occupation" class="form-control">
          <option value=""></option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="employ_status" class="col-sm-3 col-form-label">Employment Status</label>
      <div class="col-sm-9">
        <select name="" id="employ_status" class="form-control">
          <option value=""></option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="job_position" class="col-sm-3 col-form-label">Current Job Position</label>
      <div class="col-sm-9">
        <select name="" id="job_position" class="form-control">
          <option value=""></option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="tenureship" class="mb-0 col-sm-3 col-form-label">Tenureship</label>
      <div class="col-sm-9">
        <span>More than <span id="years">0</span> years</span>
        <input type="range" id="tenureship" class="form-control" min="0" max="30" step="1" value="0">
        <div class="box-minmax">
          <span>0</span><span>30</span>
        </div>
      </div>
    </div>

    <div class="form-group row mb-5">
      <label for="preferred_state" class="col-sm-3 col-form-label">Job Skills</label>
      <div class="col-sm-9">
        <input type="text" id="preferred_state" class="form-control">
      </div>
    </div>

    <div class="searchBtn_wrap">
      <button type="button" class="btn searchBtn">Search</button>
    </div>
  </form>

</div>
