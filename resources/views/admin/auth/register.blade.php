@extends('layouts.login')
@section('title', 'Sign Up')
@section('content')
<div class="login">
    <div class="login-body">
        <a href="{{route('admin.signup')}}"><img class="login-brand" src="{{asset('img/Logo.png')}}" alt="Elephant"></a>
        <center><h3 class="login-heading">Sign Up</h3></center>
        <div class="login-form">
            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
            <form data-toggle="md-validator" method="POST" action="{{route('admin.register')}}" id="registerform">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="name" type="text" name="name">
                            <label class="md-control-label">Full Name <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" id="email" type="text" name="email" >
                            <label class="md-control-label">Email <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="password" id="password" name="password" >
                            <label class="md-control-label">Password <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="password" id="con_password" name="con_password" >
                            <label class="md-control-label">Confirm Password <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" title="Sign Up">Sign up</button>
            </form>
            <center><h5>Already have an account? <a href="{{route('admin.login')}}" title="Log in ">Sign in</a></h5></center>
        </div>
    </div>
</div>
@endsection