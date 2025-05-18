@extends('layouts.admin')
@section('title', 'Department List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Add Department</span></center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <div class="panel-body panel-collapse" id="table_div">
                                <form method="POST" id="form_add_department" action="{{route('admin.saveDepartment')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="dep_name" class="control-label">Department Name <span class="mandatory">*</span></label>
                                        <input id="dep_name" placeholder="Enter the Department Name" class="form-control dep_name" type="text" name="dep_name" maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="dep_code" class="control-label">Department Code <span class="mandatory">*</span></label>
                                        <input id="dep_code" placeholder="Enter the Department Code" class="form-control dep_code" type="text" name="dep_code" maxlength="6">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="dep_hod_code">Department HOD Name <span class="mandatory">*</span></label>
                                        <select id="dep_hod_code" name="dep_hod_code" class="form-control">
                                            <option value="">Select Department HOD Name</option>
                                            @foreach($emp as $deets)
                                                <option value="{{ $deets->id }}" data-id="{{ $deets->id }}">@if($deets->emp_code != NULL) {{ $deets->emp_code }} - @endif {{$deets->name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id">
                                    </div>

                                    <div class="form-group">
                                        <center>
                                            <button type="submit" name="action" value="add_department" class="btn btn-sm btn-info" title="Save">Save</button>
                                            <button type="submit" name="action" value="save_add_department" class="btn btn-sm btn-primary" title="Save and Add New">Save & Add New</button>
                                            <a href="{{route('admin.listDepartment')}}"><button type="button" name="action" value="cancel" class="btn btn-sm btn-danger" title="Cancel">Cancel</button></a>
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
</div>
@endsection