@extends('layouts.admin')
@section('title', 'Sponsor List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Sponsor List</span></center>
            </h1>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body panel-collapse">
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="dt-buttons btn-group">
                                    <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadSponsor') }}" title="Excel">
                                        <span>Excel</span>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table table-hover table-striped table-nowrap display nowrap table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" aria-describedby="demo-datatables-fixedheader-1_info" role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Sponsor Name</th>
                                        <th class="text-center">Drug Name</th>
                                        <th class="text-center">Study Year</th>
                                        <th class="text-center">Study Revenue</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sponsor as $value)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$value->sponsor_name ?? '-'}}</td>
                                        <td class="text-center">{{$value->drug_name ?? '-'}}</td>
                                        <td class="text-center">{{$value->study_year ?? '-'}}</td>
                                        <td class="text-center">{{number_format($value->study_revenue, 2, '.', ',') ?? '-'}}</td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                            <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input sponsor_switch" {{$value->is_active?'checked':''}}>
                                            <span class="switch-track"></span>
                                            <span class="switch-thumb"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.editSponsor', base64_encode($value->id)) }}"><button class="btn btn-info" title="Edit">Edit</button></a>
                                            <a href="{{ route('admin.deleteSponsor', base64_encode($value->id)) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the Sponsor?')" title="Delete">Delete</button></a>
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