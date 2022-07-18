@extends('layouts.layout')

@section('content')
  <div class="contact_us">
    <div class="contact_top my-4">
      <div class="row">
        <div class="col-5 px-5">
          <img src="/images/kredo_logo.jpg" style="height: 2.5rem; width:2.5rem;">
        </div>
        <div class="col px-0">
          <p style="font-size:18px; font-weight:700; font-family:'Inter'; line-height:22px; color:#000000;" >CONTACT US</p>
        </div>
      </div>
    </div>

    <hr>

    <div class="contact_content mt-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 offset-md-3">
          <p style="font-weight:100; font-size:30px; line-height:36px; font-family:'Inter'; color:#000000; font-style:normal;" >Have some questions?</p>
        </div>
      </div>
      <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-4 offset-md-1">
          <img src="/images/mail.png" alt="height:150px; width:150px;">
        </div>
        <div class="col-md-3">
          <form action="" method="post">
            @csrf
            <input type="text" name="first_name" id="first_name" placeholder="first name" class="form-control mb-3">
            <input type="text" name="last_name" id="last_name" placeholder="last name" class="form-control mb-3">
            <input type="email" name="email" id="email" placeholder="email" class="form-control mb-3">
            <textarea name="question" id="question" cols="50" rows="3" class="form-control mb-3" placeholder="Enter your question..." style="resize:none;"></textarea>
            <button type="submit" class="w-100 text-white border border-none" style="background-color: #FAAC64; font-size:22px; line-height:27px; font-weight:500;">SEND MESSAGE</button>
          </form>
        </div>
      </div>
    </div>

  </div>

  @endsection
