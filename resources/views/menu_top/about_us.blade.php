@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="container-fluid mt-2">
        <header class="row">
            <div class="col-1"><a href="{{URL::to('/')}}"><img src="/images/kredo_logo.jpg"  width="50px" height="50px"></div>
            <div class="col-11 text-center ABOUTUS">ABOUT US</div>
        </header>
    </div>

    <hr>

    <div class="container-fluid AboutusPage">
        <div class="row">
            <div class="col-5 AboutusPic2">
            </div>

            <div class="col-7 mt-5">
                <h2 class="title text-center mt-3 ">OUR VISION</h2>
                    <p class="lead text-secondary mt-3">Provide a friendly and effective system for companies and individuals in expanding their network in terms of work or personal connection</p>

                <h2 class="title text-center mt-5">OUR MISSION</h2>
                    <p class="lead text-secondary mt-3">Bring out individual's confidence in making them feel that social network fun and can change someone's future and career.</p>

                <button class="btn LEARNMORE mt-5">
                    <p class="text-white h3">LEARN MORE</p>
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
