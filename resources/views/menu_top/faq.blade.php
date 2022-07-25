@extends('layouts.layout')

@section('content')
<div class="faqPage">
    <header class="header">
        <div class="header_logo"><a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a></div>
        <h2 class="header_title">FAQ</h2>
    </header>

    <div class="faq_content">
        <h3>frequentry asked questions</h3>
        <input type="text" name="faq" id="faq" class="faq_cont_input" placeholder="Type keywords to find answers">
    </div>

    <div class="container">
        <div class="faq-footer">
            <div class="row">
                <div class="col">
                    <h3 class="faq_footer_title">general</h3>
                    <span class="faq_footer_content">how to register</span><br>
                    <span class="faq_footer_content">how does it work</span>
                </div>
                <div class="col">
                    <h3 class="faq_footer_title">feature</h3>
                    <span class="faq_footer_content">how to change my profile</span><br>
                    <span class="faq_footer_content">how to change my image</span><br>
                    <span class="faq_footer_content">how to upgrade my account</span>
                </div>
                <div class="col">
                    <h3 class="faq_footer_title">tips</h3>
                    <span class="faq_footer_content">how to find good employee</span><br>
                    <span class="faq_footer_content">how to my perfect match</span><br>
                    <span class="faq_footer_content">how to choose good quality image</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
