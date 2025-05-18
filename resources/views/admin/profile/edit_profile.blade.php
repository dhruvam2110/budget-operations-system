@extends('layouts.admin')
@section('title', 'Profile Edit')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center>
                    <span class="d-ib">Edit Profile</span>
                </center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <form method="POST" id="editprofileform" action="{{route('admin.updateProfile')}}" data-toggle="validator" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" id="id" name="id" value="{{Auth::guard('admin')->user()->id}}">
                                <div class="form-group">
                                    <label for="nav-item" class="control-label">Full Name<span class="mandatory">*</span></label>
                                    <input id="name" placeholder="Enter a full name"  value="{{Auth::guard('admin')->user()->name}}" class="form-control" type="text" name="name" maxlength="50">
                                </div>
                                @if(Auth::guard('admin')->user()->emp_code != NULL)
                                    <div class="form-group has">
                                        <label for="nav-item" class="control-label">Employee Code</label>
                                        <input id="emp_code" value="{{Auth::guard('admin')->user()->emp_code}}" class="form-control" type="text" name="emp_code" disabled>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="email" class="control-label">Email <span class="mandatory">*</span></label>
                                    <input id="email" placeholder="Enter an email" value="{{Auth::guard('admin')->user()->email}}" class="form-control" type="text" name="email" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="mob_num" class="control-label">Mobile Number <span class="mandatory">*</span></label>
                                    <input id="mob_num" placeholder="Enter a mobile number" value="{{Auth::guard('admin')->user()->mob_num}}" maxlength="10" class="form-control mob_num" type="text" name="mob_num">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label">Change Profile Picture</label>
                                    <input id="image" class="dropify" data-allowed-file-extensions="jpg jpeg png gif" data-default-file="{{ asset('ProfilePicture') }}/{{ Auth::guard('admin')->user()->image }}" type="file" name="image" data-height="100" data-show-remove="false">
                                </div>
                                <div class="form-group">
                                    <p><label for="gender" class="control-label">Gender:</label></p>
                                    <input id="male" value="Male" class="custom-control-info" type="radio" name="gender" data-height="100" {{ Auth::guard('admin')->user()->gender == "Male" ? "checked" : "" }}>
                                    <label for="male" class="control-label">Male</label><br>
                                    <input id="female" value="Female" class="custom-control-info" type="radio" name="gender" data-height="100" {{ Auth::guard('admin')->user()->gender=="Female" ? "checked" : "" }}>
                                    <label for="female" class="control-label">Female</label><br>
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                    <center><button type="submit" class="btn btn-info pull-center" title="Update">Update</button>
                                    <a href="{{route('admin.dashboard')}}"><button type="button" name="action" value="cancel" class="btn btn-danger pull-center" title="Cancel">Cancel</button></a></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection