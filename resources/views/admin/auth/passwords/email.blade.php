@extends('layouts.login')
@section('title', 'Forgot Password')
@section('content')
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="{{route('admin.login')}}">
            <img class="img-responsive" src="{{ asset('img/Logo.png') }}" alt="Elephant">
        </a>
        <center><h3 class="login-heading">Forgot Password</h3></center>
        <div class="login-form">
            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
            <form method="POST" id="loginform" action="{{ route('admin.passwordemail') }}" data-toggle="validator">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="email" type="text" name="email">
                            <label class="md-control-label" for="email">Email <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" title="Send Password Reset Link">Send Password Reset Link</button>
                <center><h5>Go Back to the <a href="{{route('admin.login')}}">Sign In</a> page.</h5></center>
            </form>
        </div>
    </div>
</div>
@endsection