@extends('layouts.admin')
@section('title', 'Department List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Department List</span></center>
            </h1>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body panel-collapse" id="table_div">
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="dt-buttons btn-group">
                                    <label>
                                        <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadDepartment') }}" title="Excel">
                                            <span>Excel</span>
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table table-hover table-striped table-nowrap display nowrap table-bordered dataTable no-footer dtr-inline department_table" cellspacing="0" width = "100%" aria-describedby="demo-datatables-fixedheader-1_info" role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Department Name</th>
                                        <th class="text-center">Department Code</th>
                                        <th class="text-center">Department HOD</th>
                                        <th class="text-center">Department Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="department_list">
                                    @foreach($dep as $value)
                                        <tr id="row_department_{{ $value->id }}">
                                            <td class="text-center">{{$loop->iteration ?? '-'}}</td>
                                            <td class="text-center">{{$value->dep_name ?? '-'}}</td>
                                            <td class="text-center">{{$value->dep_code ?? '-'}}</td>
                                            <td class="text-center">{{$value->emp->name ?? '-'}}</td>
                                            <td class="text-center">
                                                <label class="switch switch-success">
                                                <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input department_switch" {{$value->is_active?'checked':''}}>
                                                <span class="switch-track"></span>
                                                <span class="switch-thumb"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.editDepartment', base64_encode($value->id)) }}"><button data-id="{{ $value->id }}" class="btn btn-info edit_department" id="edit_department" title="Edit">Edit</button></a>

                                                <a href="{{ route('admin.deleteDepartment', base64_encode($value->id)) }}"><button data-id="{{ $value->id }}" class="btn btn-danger delete_department" id="delete_department" onclick="return confirm('All the allocated budget and expenditure to the given department will be deleted. Are you sure you want to delete the Department?')" title="Delete">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection