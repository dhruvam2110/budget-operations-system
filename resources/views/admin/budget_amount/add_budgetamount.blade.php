@extends('layouts.admin')
@section('title', 'Add Budget Amount')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Add Budget Amount</span></center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <div class="panel-body panel-collapse" id="table_div">
                                <form method="POST" id="form_add_budgetamount" action="{{route('admin.saveBudgetAmount')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="year" class="control-label">Financial Year <span class="mandatory">*</span></label>
                                        <select class="form-control year" name="year" id='year'>
                                            <option class="year-opt" value="" selected>Select Financial Year</option>
                                            @for($prev_year = 2030; $prev_year >= 2006; $prev_year--)
                                                @php
                                                    $first_year = substr($prev_year, -2);
                                                @endphp
                                                <option class="year-opt" value="{{ $prev_year - 1 }} - {{ $first_year }}">{{ $prev_year - 1 }} - {{ $first_year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="budget_allocated" class="control-label">Budget Amount <span class="mandatory">*</span></label>
                                        <div class="input-with-icon">
                                            <input placeholder="Enter the Budget amount" class="form-control number" name="budget_allocated" type="text" maxlength="11">
                                            <span class="icon icon-inr input-icon"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <button type="submit" name="action" value="add_budget" class="btn btn-sm btn-info" title="Save">Save</button>
                                            <button type="submit" name="action" value="save_add_budget" class="btn btn-sm btn-primary" title="Save & Add New">Save & Add New</button>
                                            <a href="{{route('admin.listBudgetAmount')}}"><button type="button" name="action" value="cancel" class="btn btn-sm btn-danger" title="Cancel">Cancel</button></a>
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