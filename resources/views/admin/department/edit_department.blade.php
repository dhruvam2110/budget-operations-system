@extends('layouts.admin')
@section('title', 'Department List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Edit Department</span></center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <div class="panel-body panel-collapse" id="table_div">
                                <form method="POST" id="form_edit_department" action="{{route('admin.updateDepartment')}}">
                                    @csrf                                    
                                    <div class="form-group">
                                        <label for="dep_name" class="control-label">Department Name <span class="mandatory">*</span></label>
                                        <input id="dep_name" placeholder="Enter the Department Name" class="form-control dep_name" value="{{ $dep->dep_name }}" type="text" name="dep_name" maxlength="50">
                                    </div>
                                    <div class="form-group">
                                        <label for="dep_code" class="control-label">Department Code <span class="mandatory">*</span></label>
                                        <input id="dep_code" value="{{ $dep->dep_code }}" placeholder="Enter the Department Code" class="form-control dep_code" type="text" name="dep_code" maxlength="6">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="dep_hod_code">Department HOD Name <span class="mandatory">*</span></label>
                                        <div class="dep_hod_code">
                                            <select id="dep_hod_code" name="dep_hod_code" class="form-control">
                                                <option value="">Select Department HOD name</option>
                                                @if(!is_null($emp))
                                                    @foreach($emp as $deets)
                                                        <option value="{{ $deets->id }}" data-id="{{ $deets->id }}" @if($dep->emp_code == $deets->id) selected @endif>@if($deets->emp_code != NULL) {{ $deets->emp_code }} - @endif {{$deets->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="{{ $dep->id }}">
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <button type="submit" name="action" value="edit_department" class="btn btn-sm btn-info" title="Update">Update</button>

                                            <a href="{{ route('admin.listDepartment') }}"><button type="button" name="action" value="cancel" class="btn btn-sm btn-danger" title="Cancel">Cancel</button></a>
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