@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="header text-center mt-5">
    <h1>User Details</h1>
  </div>
  <div class="card bg-light w-75 mx-auto mt-3">
    <div class="card-header border border-none">
      <div class="name text-center">
        {{ $user->first_name }}&nbsp;{{ $user->last_name }}
      </div>
    </div>
    <div class="card-body bg-white">
      <div class="gender">
        <p>
          Gender:&nbsp;{{ $user->gender == 1 ? 'Female' : 'Male' }}
        </p>
      </div>
      <div class="email">
        <p>
          Email:&nbsp;{{ $user->email }}
        </p>
      </div>
      <div class="self_introduction">
        <p>
          Self Introduction:&nbsp;{{ $user->self_introduction }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
