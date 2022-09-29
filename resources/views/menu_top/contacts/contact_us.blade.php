@extends('layouts.layout')

@section('content')

<div class="contact_us">
    <div class="contact_top my-4">
        <div class="row">
            <div class="col-5 px-5">
                <a href="{{ route('home') }}">
                    <img src="/images/kredo_logo.jpg" class="logo">
                </a>
            </div>
            <div class="col px-0">
                <p class="pagetitle">CONTACT US</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="contact_content mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 offset-md-3">
                <p class="title">Have some questions?</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-3">
                <img src="/images/mail.png">
            </div>
            <div class="col-md-4">
                <form action="{{ route('contact.confirm') }}" method="post">
                    @csrf

                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="first_name" id="first_name" placeholder="first name"
                        class="form-control mb-3" value="{{ old('first_name') }}" required>

                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="last_name" id="last_name" placeholder="last name"
                        class="form-control mb-3" value="{{ old('last_name') }}" required>

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="email" name="email" id="email" placeholder="email" class="form-control mb-3"
                        value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                        {{ Auth::check() ? 'readonly' : 'required' }}>

                    @error('inquiry')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="inquiry" id="inquiry" cols="100" row="10" class="form-control contact-inquiry mb-3"
                        placeholder="Enter your question..." required>{{ old('inquiry') }}</textarea>

                    <button type="submit" class="w-100 text-white border border-none submitbtn">SEND MESSAGE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
