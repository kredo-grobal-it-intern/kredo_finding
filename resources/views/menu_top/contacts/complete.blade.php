@extends('layouts.layout')

@section('title', 'Contact Complete')

@section('content')

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

    <div class="container">
        <div class="comp-content">
            <p class="content-header">Thank you for contacting us.</p>
            <p class="content-text">We have received your inquiry and will get back to you soon.</p>
    
            <a href="{{ route('top') }}" class="comp-btn">Go back to Top Page</a>
        </div>        
    </div>
@endsection