@extends('layouts.admin')
@section('title', 'Employee List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Employee List</span></center>
            </h1>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body panel-collapse">
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="dt-buttons btn-group">
                                    <a title="Excel" class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadEmployee') }}">
                                        <span>Excel</span>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table table-hover display nowrap table-striped table-nowrap table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" aria-describedby="demo-datatables-fixedheader-1_info" role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Profile Picture</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Employee Code</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile Number</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $value)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">
                                            <img class="rounded" src="{{asset('/ProfilePicture/'.$value->image)}}" width="36" height="36" style="border-radius: 50%">
                                        </td>
                                        <td class="text-center">{{$value->name ?? '-'}}</td>
                                            <td class="text-center">{{$value->emp_code ?? '-'}}</td>
                                        <td class="text-center">{{$value->email ?? '-'}}</td>
                                            <td class="text-center">{{$value->mob_num ?? '-'}}</td>
                                            <td class="text-center">{{$value->gender ?? '-'}}</td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                            <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input employee_switch" {{$value->is_active?'checked':''}}>
                                            <span class="switch-track"></span>
                                            <span class="switch-thumb"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.editEmployee', base64_encode($value->id)) }}" title="Edit"><button class="btn btn-info">Edit</button></a>
                                            <a href="{{ route('admin.deleteEmployee', base64_encode($value->id)) }}" title="Delete"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the Employee?')">Delete</button></a>
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