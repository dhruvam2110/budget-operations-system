@extends('layouts.login')
@section('title', 'Change Password')
@section('content')
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="{{route('admin.login')}}">
            <img class="img-responsive" src="{{ asset('img/Logo.png') }}" alt="Veeda">
        </a>
        <center><h3 class="login-heading">Reset Password</h3></center>
        <div class="login-form">
            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
            <form method="POST" id="resetform" action="{{ route('admin.resetpassword') }}" data-toggle="validator">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ $token }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="newpassword" type="password" name="newpassword">
                            <label class="md-control-label" for="newpassword">Password <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="connewpassword" type="password" name="connewpassword">
                            <label class="md-control-label" for="connewpassword">Confirm Password <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection