@extends('layouts.layout')

@section('title', 'Contact Confirm')

@section('content')

    <div class="contact_top my-4">
        <div class="row">
            <div class="col-5 px-5">
                <a href="{{ route('home') }}">
                    <img src="/images/kredo_logo.jpg" style="height: 2.5rem; width:2.5rem;">
                </a>
            </div>
            <div class="col px-0">
                <p style="font-size:18px; font-weight:700; font-family:'Inter'; line-height:22px; color:#000000;">
                    CONTACT US
                </p>
            </div>
        </div>
    </div>

    <hr>

    <form action="{{ route('contact.complete') }}" method="post">
        @csrf

        <div class="container mt-5">
            <div class="card w-75">
                <div class="card-header">
                    <h2 class="card-title">Confirmation</h2>
                    <p class="card-subtitle">Please press the SEND button if your inquiry below is good.</p>
                    <p class="card-subtitle">Please press the BACK button if you want to change your inquiry.</p>
                </div>

                <div class="card-body">
                    <div class="body-inquiry row">
                        <p class="col-3 inquiry-title">First name</p>
                        <p class="col-9 inquiry-detail" name="first_name">{{ $first_name }}</p>
                        <input type="hidden" name="first_name" value="{{ $first_name }}">

                        @error('first_name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="body-inquiry row">
                        <p class="col-3 inquiry-title">Last name</p>
                        <p class="col-9 inquiry-detail" name="last_name">{{ $last_name }}</p>
                        <input type="hidden" name="last_name" value="{{ $last_name }}">

                        @error('last_name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="body-inquiry row">
                        <p class="col-3 inquiry-title">email</p>
                        <p class="col-9 inquiry-detail" name="email">{{ $email }}</p>
                        <input type="hidden" name="email" value="{{ $email }}">

                        @error('email')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="body-inquiry row">
                        <p class="col-3 inquiry-title">Inquiry</p>
                        <p class="col-9 inquiry-detail" name="inquiry">{{ $inquiry }}</p>
                        <input type="hidden" name="inquiry" value="{{ $inquiry }}">

                        @error('inquiry')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="button">
                        <button type="submit" name="back" value="back" class="button-return">BACK</button>
                        <button type="submit" name="submit" value="submit" class="button-send">SEND</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
