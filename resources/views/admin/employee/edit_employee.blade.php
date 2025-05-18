@extends('layouts.admin')
@section('title', 'Edit Employee')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center>
                    <span class="d-ib">Edit Employee</span>
                </center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <form method="POST" id="edit_employee_form" action="{{route('admin.updateEmployee')}}" data-toggle="validator" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $employees->id }}">
                                <div class="form-group">
                                    <label for="nav-item" class="control-label">Employee Name <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Employee Name" id="name" value="{{ $employees->name }}" class="form-control" type="text" name="name" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="emp_code" class="control-label">Employee Code <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Employee Code" id="emp_code" value="{{ $employees->emp_code }}" class="form-control mob_num" type="text" name="emp_code" maxlength="7">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label">Employee Email <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Employee Email" id="email" name="email" class="form-control" type="text" value="{{ $employees->email }}" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="mob_num" class="control-label">Employee Mobile Number <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Employee Mobile Number" id="mob_num" value="{{ $employees->mob_num }}" maxlength="10" class="form-control mob_num" type="text" name="mob_num">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label">Employee Profile Picture</label>
                                    <input id="image" data-default-file="{{ asset('ProfilePicture') }}/{{ $employees->image }}" class="dropify" data-allowed-file-extensions="jpg jpeg png gif" type="file" name="image" data-height="100" data-show-remove="false">
                                </div>
                                <div class="form-group">
                                    <p><label for="gender" class="control-label">Employee Gender</label></p>
                                    <input id="male" value="Male" class="custom-control-info" type="radio" name="gender" data-height="100" {{ ($employees->gender=="Male")? "checked" : "" }}>
                                    <label for="male" class="control-label">Male</label><br>
                                    <input id="female" value="Female" class="custom-control-info" type="radio" name="gender" data-height="100" {{ ($employees->gender=="Female")? "checked" : "" }}>
                                    <label for="female" class="control-label">Female</label><br>
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-info pull-center" title="Update">Update</button>
                                        <a href="{{route('admin.listEmployee')}}"><button type="button" name="action" value="cancel" class="btn btn-danger pull-center" title="Cancel">Cancel</button></a>
                                    </center>
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