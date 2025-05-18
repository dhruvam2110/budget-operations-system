@extends('layouts.login')
@section('title', 'Login')
@section('content')
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="{{route('admin.login')}}">
            <img class="img-responsive" src="{{ asset('img/Logo.png') }}" alt="Veeda">
        </a>
        <center><h3 class="login-heading">Sign In</h3></center>
        <div class="login-form">
            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
            <form method="POST" id="loginform" action="{{ route('admin.postlogin') }}" data-toggle="validator">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="email" type="text" name="email">
                            <label class="md-control-label" for="email">Email <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="password" type="password" name="password">
                            <label class="md-control-label" for="password">Password <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" title="Sign In">Sign in</button>
            </form>
            <p><center>Don't have an account? <a href="{{route('admin.signup')}}" title="Sign Up">Sign Up</a></center></p>
            <center><p><a href="{{route('admin.auth.password.resetpass')}}">Forgot password?</a></p></center>
        </div>
    </div>
</div>
@endsection