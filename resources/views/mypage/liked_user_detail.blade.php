@extends('layouts.layout')

@section('content')
<div class="navpage mt-3">
  <header class="mypage-header p-4">
    <div class="header_logo">
      <a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a>
    </div>
  </header>
</div>
<div class="container user_detail">
  <div class="card bg-light w-75 mx-auto mt-5">
    <div class="card-header border border-none p-0">
      <div class="user_img">
        <div class="name text-white">
          <p class="h2">
            User Overview
          </p>
        </div>
      </div>
    </div>
    <div class="card-body bg-white">
      <table class="table border">
        <thead>
          <tr>
            <th class="bg-success text-center text-white">Name</th>
            <th>{{ $user->first_name }}&nbsp;{{ $user->last_name }}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="bg-success text-center text-white">Gender</td>
            <td>{{ $user->gender == 1 ? 'Female' : 'Male' }}</td>
          </tr>
          <tr>
            <td class="bg-success text-center text-white">Email</td>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <td class="bg-success text-center text-white">Self Introduction</td>
            <td>{{ $user->self_introduction }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
