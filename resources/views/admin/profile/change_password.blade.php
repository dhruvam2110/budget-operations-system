@extends('layouts.admin')
@section('title', 'Change Password')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center>
                    <span class="d-ib">Change Password</span>
                </center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <form method="POST" id="changepassform" action="{{route('admin.updatePassword')}}" data-toggle="validator">
                                @csrf
                                <div class="form-group">
                                    <label for="oldpassword" class="control-label">Current Password <span class="mandatory">*</span></label>
                                    <input id="oldpassword" placeholder="Enter your old password" class="form-control" type="password" name="oldpassword"  maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword" class="control-label">New Password <span class="mandatory">*</span></label>
                                    <input id="newpassword" placeholder="Enter your new password" class="form-control" type="password" name="newpassword"  maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="connewpassword" class="control-label">Confirm New Password <span class="mandatory">*</span></label>
                                    <input id="connewpassword" placeholder="Enter your confirm new password again" class="form-control" type="password" name="connewpassword"  maxlength="50">
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                    <center><button type="submit" id="toastrsubmit" class="btn btn-info pull-center" title="Update">Update</button>
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