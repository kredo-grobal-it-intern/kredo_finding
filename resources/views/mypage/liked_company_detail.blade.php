@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="header text-center mt-5">
    <h1>Company Details</h1>
  </div>
  <div class="card bg-light w-75 mx-auto mt-3">
    <div class="card-header border border-none">
      <div class="name text-center">
        {{ $company->name }}
      </div>
    </div>
    <div class="card-body bg-white">
      <div class="email">
        <p>
          Email:&nbsp;{{ $company->email }}
        </p>
      </div>
      <div class="self_introduction">
        <p>
          Self Introduction:&nbsp;{{ $company->self_introduction }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
