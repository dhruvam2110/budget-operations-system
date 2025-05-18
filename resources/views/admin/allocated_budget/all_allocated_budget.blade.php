@extends('layouts.admin')
@section('title', 'Allocated Budget List')
@section('content')

<!-- Modal -->
<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <center><h2 class="modal-title" id="title_modal"></h2></center>
                <center><h3 class="modal-title" id="exampleModalLabel">{{ $date->year }}</h3></center>
                <input type="hidden" name="budget_year" id="budget_year" value="{{ $date->id }}">
            </div>
            <form method="POST" id="form_allocate_budget" action="{{route('admin.saveAllocatedBudget')}}">
                @csrf
                <div class="modal-body">
                    <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                    <div class="panel-body panel-collapse" id="table_div">
                        <div class="form-group col-md-12" id="add_modal_budget_allocation">
                            <label class="control-label" for="dep_id">Department Name <span class="mandatory">*</span></label>
                            <select id="dep_id" name="dep_id" class="form-control">
                                <option value="">Select Deparmtent Name</option>
                                @foreach($dep as $deets)
                                    <option value="{{ $deets->id }}" data-id="{{ $deets->id }}">{{$deets->dep_name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group col-md-12" id="edit_modal_budget_allocation">
                            <label for="edit_dep_id" class="control-label">Department Name</label>
                            <input class="form-control" type="text" name="edit_dep_id" id="edit_dep_id">
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="total_budget" class="control-label">Total Budget</label>
                                <input class="form-control" type="text" name="total_budget" value="{{ $date->budget_allocated }}" id="total_budget" disabled>
                            </div>
                            <div class="col-xs-6">
                                <label for="budget_remaining" class="control-label">Budget Remaining</label>
                                <input class="form-control" type="text" name="budget_remaining" id="budget_remaining" disabled><br>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="budget_allocated" class="control-label">Allocation Amount <span class="mandatory">*</span></label>
                            <input id="budget_allocated" placeholder="Enter the Allocation Amount" class="form-control budget_allocated number" type="text" name="budget_allocated" maxlength="18">
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="year" id="year" value="{{ $date->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" id="submit_modal"></button>
                    <button type="button" class="btn btn-danger" id="close_modal" data-dismiss="modal" title="Cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main Body -->
<div class="layout-content">
    <div class="layout-content-body">
        <div class="card">
            <div class="card-body">
                <div class="title-bar">
                    <div class="row">
                        <div class="col-md-5">
                            <h1 class="title-bar-title"><span class="d-ib">Allocated Budget List</span></h1>
                        </div>
                        <div class="col-md-7    ">
                            <h1 class="title-bar-title" style="float: left;"><span class="d-ib">{{ $date->year }}</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body panel-collapse" id="table_div">
                        <div class="row">
                            <!-- <div class="col-sm-10">
                                <div class="dt-buttons btn-group">
                                    <label>
                                        <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadAllocatedBudget', base64_encode( $date->year )) }}" title="Excel">
                                            <span>Excel</span>
                                        </a>
                                    </label>
                                </div>
                            </div> -->
                            <div style="float: right; margin-right: 30px;">
                                <label>
                                    <button type="button" class="btn btn-info btn-sm buttons-print open_modal" id="open_modal" data-toggle="modal" data-target="#form_modal"  title="Allocate Budget">
                                        Allocate Budget
                                    </button>
                                </label>
                                <label>
                                    <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.listBudgetAmount') }}"  title="Back"><span>Back</span></a>
                                </label>
                            </div>
                        </div>
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table table-striped table-bordered display nowrap table-nowrap dataTable budget_table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Department Name</th>
                                        <th class="text-center">Budget Allocated</th>
                                        <th class="text-center">Budget Used</th>
                                        <th class="text-center">Budget Remaining</th>
                                        <!-- <th class="text-center">Budget Status</th> -->
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($budget as $value)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration ?? '-' }}</td>
                                            <td class="text-center">{{ $value->dep->dep_name ?? '-' }}</td>
                                            <td class="text-center">{{ number_format($value->budget_allocated, 2, '.', ',') ?? '-' }}</td>
                                            <td class="text-center">{{ number_format(\App\Models\DepartmentExpenditure::where('dep_id', $value->id)->sum('expense'), 2, '.', ',') }}</td>
                                            <td class="text-center">{{ number_format($value->budget_allocated - \App\Models\DepartmentExpenditure::where('dep_id', $value->id)->sum('expense'), 2, '.', ',') ?? '-' }}</td>
                                            <!-- <td class="text-center">
                                                <label class="switch switch-success">
                                                <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input dep_budget_switch" {{$value->is_active?'checked':''}}>
                                                <span class="switch-track"></span>
                                                <span class="switch-thumb"></span>
                                                </label>
                                            </td> -->
                                            <td class="text-center">
                                                @if($value->dep != '')
                                                    <a href="{{ route('admin.listDepartmentExpenditure', base64_encode($value->id)) }}"><button class="btn btn-info edit_budgetamount" id="edit_budgetamount" title="Expenditure">Expenditure</button></a>
                                                    <button class="btn btn-primary edit_modal" id="edit_modal" data-id="{{ $value->id }}" data-toggle="modal" data-target="#form_modal" title="Edit">Edit</button>
                                                @endif
                                                <a href="{{ route('admin.deleteAllocatedBudget', base64_encode($value->id)) }}"><button data-id="{{ $value->id }}" class="btn btn-danger delete_budgetamount" id="delete_allocated_budgetamount" onclick="return confirm('Are you sure you want to delete the Allocated Budget?')" title="Delete">Delete</button></a>
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