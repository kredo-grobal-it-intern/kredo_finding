@extends('layouts.layout')

@section('content')
    <div class="navpage mt-3">
        <header class="mypage-header p-4">
            <div class="header_logo">
                <a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a>
            </div>
        </header>
    </div>
    <div class="container company_detail">
        <div class="card bg-light w-75 mx-auto mt-5">
            <div class="card-header border border-none">
                <div class="company_img">
                    <div class="name text-white">
                        <p class="h2">{{ $company->name }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body bg-white">
                <h3 class="text-info">Company Overview</h3>
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="bg-info text-center text-white">Company Name</th>
                            <th>{{ $company->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-info text-center text-white">Email</td>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td class="bg-info text-center text-white">Self Introduction</td>
                            <td>{{ $company->services }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
