@extends('layouts.admin')
@section('title', 'Budget Amount List')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Budget Amount List</span></center>
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
                                        <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadBudgetAmount') }}" title="Excel">
                                            <span>Excel</span>
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table table-striped table-bordered display nowrap table-nowrap dataTable budget_table" cellspacing="0" width = "100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Financial Year</th>
                                        <th class="text-center">Budget Allocated</th>
                                        <th class="text-center">Budget Used</th>
                                        <th class="text-center">Budget Remaining</th>
                                        <!-- <th class="text-center">Budget Status</th> -->
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="department_list">
                                    @foreach($bud_amt as $value)
                                        <tr id="row_department_{{ $value->id }}">
                                            <td class="text-center">{{ $loop->iteration ?? '-' }}</td>
                                            <td class="text-center">{{ $value->year ?? '-' }}</td>
                                            <td class="text-center">{{ number_format($value->budget_allocated, 2, '.', ',') ?? '-'}}</td>
                                            <td class="text-center">{{ number_format(\App\Models\AllocatedBudget::where('budget_id', $value->id)->sum('budget_used'), 2, '.', ',') ?? '-'}}</td>
                                            <td class="text-center">{{ number_format($value->budget_allocated - \App\Models\AllocatedBudget::where('budget_id', $value->id)->sum('budget_used'), 2, '.', ',') ?? '-'}}</td>
                                            <!-- <td class="text-center">
                                                <label class="switch switch-success">
                                                <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input budget_switch" {{$value->is_active?'checked':''}}>
                                                <span class="switch-track"></span>
                                                <span class="switch-thumb"></span>
                                                </label>
                                            </td> -->
                                            <td class="text-center">
                                                <a href="{{ route('admin.listAllocatedBudget', base64_encode($value->id)) }}"><button class="btn btn-info edit_budgetamount" id="edit_budgetamount" title="Budget Details">Budget Details</button></a>
                                                <a href="{{ route('admin.editBudgetAmount', base64_encode($value->id)) }}"><button class="btn btn-primary edit_budgetamount" id="edit_budgetamount" title="Edit">Edit</button></a>
                                                <a href="{{ route('admin.deleteBudgetAmount', base64_encode($value->id)) }}"><button data-id="{{ $value->id }}" class="btn btn-danger delete_budgetamount" id="delete_budgetamount" onclick="return confirm('Are you sure you want to delete the Budget Amount?')" title="Delete">Delete</button></a>
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