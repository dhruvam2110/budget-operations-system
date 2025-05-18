@extends('layouts.admin')
@section('title', 'Department Expenditure List')
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
                <center><h3 class="modal-title" id="exampleModalLabel"></h3></center>
            </div>
            <form method="POST" id="add_expense_form" action="{{ route('admin.saveDepartmentExpense') }}">
                @csrf
                <div class="modal-body">
                    <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                    <div class="panel-body panel-collapse" id="table_div">
                        <div class="individual_inputs">
                            <input type="hidden" name="dep_id" id="dep_id" value="{{ $dep_details->id }}">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="budget_id" id="budget_id" value="{{ $dep_details->budget_id }}">
                        </div>
                        <div class="form-group" id="zero">
                            <div class="col-md-6">
                                <label for="total_budget" class="control-label">Total Budget</label>
                                <input class="form-control" type="text" name="total_budget" id="total_budget" value="{{ $dep_details->budget_allocated }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="budget_remaining" class="control-label">Budget Remaining</label>
                                <input class="form-control" type="text" name="budget_remaining" id="budget_remaining" readonly><br>
                            </div>
                        </div>
                        <div id="variable_expense_type">
                            <div class="form-group col-md-12">
                                <label for="expense_type" class="control-label">Expense Type <span class="mandatory">*</span></label>
                                <select class="form-control expense_type" name="expense_type" id='expense_type'>
                                    <option value="" selected> Select Expense Type </option>
                                    <option value="Capex">Capex</option>
                                    <option value="Opex">Opex</option>
                                    <option value="Salary">Salary</option>
                                </select>
                            </div>
                        </div>
                        <div id="capex">
                            <div class="form-group col-md-12" id="one">
                                <label for="item_name" class="control-label">Item Name <span class="mandatory">*</span></label>
                                <input id="item_name" placeholder="Enter the Item Name" class="form-control item_name capex" type="text" name="item_name" maxlength="50">
                            </div>
                            <div class="form-group col-md-12" id="two">
                                <label for="quantity" class="control-label">Quantity <span class="mandatory">*</span></label>
                                <input id="quantity" placeholder="Enter the Quantity" class="form-control quantity mob_num capex" type="text" name="quantity" maxlength="7">
                            </div>
                            <div class="form-group col-md-12" id="three">
                                <label for="price_per_quantity" class="control-label">Price per Quantity <span class="mandatory">*</span></label>
                                <input id="price_per_quantity" placeholder="Enter the Price per Quantity" class="form-control price_per_quantity number capex" type="text" name="price_per_quantity" maxlength="10">
                            </div>
                            <div class="form-group col-md-12" id="eight">
                                <label for="expense" class="control-label">Total Expense</label>
                                <input id="expense" placeholder="Enter the Total Expense" class="form-control expense number salary" type="text" name="expense" maxlength="11">
                            </div>
                        </div> 
                        <div id="opex">
                            <div class="form-group col-md-12" id="four">
                                <label for="service_name" class="control-label">Service Name <span class="mandatory">*</span></label>
                                <input id="service_name" placeholder="Enter the Service Name" class="form-control service_name opex" type="text" name="service_name" maxlength="50">
                            </div>
                            <div class="form-group">
                                <div class="input-group input-daterange" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-M-yyyy">
                                    <div class="col-md-6">
                                        <label for="start_date" class="control-label">Service Start Date <span class="mandatory">*</span></label>
                                        <input class="form-control start_date opex" placeholder="Select a service start date" id="start_date" name="start_date" type="text" value="{{ now()->format('d-M-Y') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date" class="control-label">Service End Date <span class="mandatory">*</span></label>
                                        <input class="form-control end_date opex" id="end_date" placeholder="Select a service end date" name="end_date" type="text" value="{{ now()->format('d-M-Y') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="col-md-6">
                                    <label for="start_date" class="control-label">Service Start Date <span class="mandatory">*</span></label>
                                    <div class="input-with-icon">
                                        <input id="start_date" name="start_date" class="form-control start_date opex" type="text" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-MM-yyyy">
                                        <span class="icon icon-calendar input-icon"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date" class="control-label">Service End Date <span class="mandatory">*</span></label>
                                    <div class="input-with-icon">
                                        <input id="end_date" name="end_date" class="form-control end_date opex" type="text" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-MM-yyyy">
                                        <span class="icon icon-calendar input-icon"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group col-md-12" id="six">
                                <label for="remarks" class="control-label">Remarks</label>
                                <input id="remarks" placeholder="Enter the Remakrs" class="form-control remarks opex" type="text-area" name="remarks" maxlength="200">
                            </div>
                            <div class="form-group col-md-12" id="eight">
                                <label for="opex_expense" class="control-label">Total Expense <span class="mandatory" id="mandatory">*</span></label>
                                <input id="opex_expense" placeholder="Enter the Total Expense" class="form-control opex_expense number salary" type="text" name="opex_expense" maxlength="11">
                            </div>
                        </div>
                        <div id="salary">
                            <div class="form-group col-md-12" id="seven">
                                <label for="month" class="control-label">Month <span class="mandatory">*</span></label>
                                <select class="form-control month salary" name="month" id='month'>
                                    <option value="" selected> Select Month </option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12" id="eight">
                                <label for="salary_expense" class="control-label">Total Expense <span class="mandatory" id="mandatory">*</span></label>
                                <input id="salary_expense" placeholder="Enter the Total Expense" class="form-control salary_expense number salary" type="text" name="salary_expense" maxlength="11">
                            </div>
                        </div>
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
                            <h1 class="title-bar-title"><span class="d-ib">Expenditure List</span></h1>
                        </div>
                        <div class="col-md-7    ">
                            <h1 class="title-bar-title" style="float: left;"><span class="d-ib">{{ $dep_details->dep->dep_name }} ({{ $dep_details->year->year }})</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row gutter-xs">
                    <div class="panel panel-default">
                        <div class="panel-body panel-collapse">
                            <h3>&nbsp;&nbsp;&nbsp;Filter</h3>
                            <form method="POST" id="expense_filter" action="{{ route('admin.listDepartmentExpenditure', base64_encode($dep_details->id)) }}" data-toggle="validator">
                                @csrf
                                <input type="hidden" name="dep_id" id="dep_id" value="{{ $dep_details->id }}">
                                <div class="form-group col-md-3">
                                    <select class="form-control expense_type_filter" name="expense_type_filter" id='expense_type_filter'>
                                        <option value="" selected> Select Expenditure Type </option>
                                        <option value="Capex" {{ ($filter == "Capex") ? 'selected' : '' }}>Capex</option>
                                        <option value="Opex" {{ ($filter == "Opex") ? 'selected' : '' }}>Opex</option>
                                        <option value="Salary" {{ ($filter == "Salary") ? 'selected' : '' }}>Salary</option>
                                    </select>
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                        <button type="submit" name="action" value="add_employee" class="btn btn-info pull-center" title="Submit">Submit</button>
                                        @if($reset == 1)
                                            <a href="{{ route('admin.listDepartmentExpenditure', base64_encode($dep_details->id)) }}"><button type="button" name="reset" value="reset" class="btn btn-danger pull-center" title="Reset">Reset</button></a>
                                        @endif
                                </div>
                            </form>
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
                                        <a class="btn btn-primary btn-sm buttons-print" tabindex="0" aria-controls="demo-datatables-buttons-1" href="{{ route('admin.downloadDepartmentExpenditure', base64_encode($dep_details->year->year)) }}" title="Excel">
                                            <span>Excel</span>
                                        </a>
                                    </label>
                                </div>
                            </div> -->
                            <div style="float: right; margin-right: 38px;">
                                <label>
                                    <button type="button" class="btn btn-info btn-sm buttons-print expense_modal" id="expense_modal" data-toggle="modal" data-target="#form_modal" title="Add Expense">
                                        Add Expense
                                    </button>
                                </label>
                                <label>
                                    <a href="{{ route('admin.listAllocatedBudget', base64_encode($dep_details->budget_id)) }}"><button type="button" class="btn btn-primary btn-sm buttons-print back" id="back" title="Back">
                                        Back
                                    </button></a>
                                </label>
                            </div>
                        </div>
                        <div class="row"><div class="col-sm-6"><div class="dt-buttons btn-group"></div></div></div>
                        <div id="demo-datatables-fixedheader-1_wrapper" class="datatables_wrapper form-inline dt-bootstrap no-footer table_style">
                            <table id="table" class="table display nowrap table-striped table-bordered table-nowrap dataTable budget_table" cellspacing="0" width = "100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th class="text-center">Expense Type</th>
                                        <th class="text-center">Item Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price per Quantity</th>
                                        <th class="text-center">Service Name</th>
                                        <th class="text-center">Service Start Date</th>
                                        <th class="text-center">Service End Date</th>
                                        <th class="text-center">Remarks</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Expense</th>
                                        <!-- <th class="text-center">Status</th> -->
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="department_list">
                                    @foreach($exp_details as $value)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration ?? '-' }}</td>
                                            <td class="text-center">{{ $value->expense_type ?? '-' }}</td>
                                            <td class="text-center">{{ $value->item_name ?? '-' }}</td>
                                            <td class="text-center">{{ $value->quantity ?? '-' }}</td>
                                            @if($value->price_per_quantity != NULL)
                                                <td class="text-center">{{ number_format($value->price_per_quantity, 2, '.', ',') }}</td>
                                            @else
                                                <td class="text-center">{{ '-' }}</td>
                                            @endif
                                            <td class="text-center">{{ $value->service_name ?? '-' }}</td>
                                            <td class="text-center">{{ $value->service_start_date ?? '-' }}</td>
                                            <td class="text-center">{{ $value->service_end_date ?? '-' }}</td>
                                            <td class="text-center">{{ $value->remarks ?? '-' }}</td>
                                            <td class="text-center">{{ $value->month ?? '-' }}</td>
                                            <td class="text-center">{{ number_format($value->expense, 2, '.', ',') ?? '-' }}</td>
                                            <!-- <td class="text-center">
                                                <label class="switch switch-success">
                                                <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input expense_switch" {{$value->is_active?'checked':''}}>
                                                <span class="switch-track"></span>
                                                <span class="switch-thumb"></span>
                                                </label>
                                            </td> -->
                                            <td class="text-center">
                                                <button class="btn btn-info edit_exp_modal" id="edit_exp_modal" data-id="{{ $value->id }}" data-toggle="modal" data-target="#form_modal" title="Edit">Edit</button>

                                                <a href="{{ route('admin.deleteExpense', base64_encode($value->id)) }}"><button data-id="{{ $value->id }}" class="btn btn-danger delete_budgetamount" id="delete_allocated_budgetamount" onclick="return confirm('Are you sure you want to delete the Expenditure?')" title="Delete">Delete</button></a>
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