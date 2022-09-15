@extends('layouts.layout')

@section('content')
    <div class="container changePass mt-5">
        <div class="row">
            <div class="changePassImg col-5"></div>
            <div class="col-md-7 mt-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-secondary">Change your account password</h1>
                        <p class="lead mt-3">Your new password must be at least 8 characters.</p>
                    </div>

                    <div class="panel-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                            {{ csrf_field() }}
                            <div class="password-content">
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Current Password</label>
                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control"
                                            name="current-password" required>
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">New Password</label>
                                    <div class="col-md-6">
                                        <input id="new-password" type="password" class="form-control" name="new-password"
                                            required>
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new-password-confirm" class="col control-label">Confirm New Password</label>
                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" class="form-control"
                                            name="new-password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn submitBtn btn-primary">Change Password</button><br>
                                <button type="button" onclick="history.back()"
                                    class="btn backBtn btn-outline-primary">Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
