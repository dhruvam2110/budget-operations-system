@extends('layouts.admin')
@section('title', 'Edit Budget Amount')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center><span class="d-ib">Edit Budget Amount</span></center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <div class="panel-body panel-collapse" id="table_div">
                                <form method="POST" id="form_edit_budgetamount" action="{{route('admin.updateBudgetAmount')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="year" class="control-label">Financial Year <span class="mandatory">*</span></label>
                                        <select class="form-control" name="year" id='year'>
                                            <option value="{{ $bud->year }}" hidden>{{ $bud->year }}</option>
                                            @for($prev_year = 2030; $prev_year >= 2006; $prev_year--)
                                                @php
                                                    $first_year = substr($prev_year, -2);
                                                @endphp
                                                <option value="{{ $prev_year - 1 }} - {{ $first_year }}">{{ $prev_year - 1 }} - {{ $first_year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="budget_allocated" class="control-label">Budget Amount<span class="mandatory">*</span></label>
                                        <div class="input-with-icon">
                                            <input placeholder="Enter the Budget amount" id="budget_allocated" class="form-control number" name="budget_allocated" type="text" value="{{ $bud->budget_allocated }}" maxlength="11">
                                            <span class="icon icon-inr input-icon"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="{{ $bud->id }}">
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <button type="submit" value="add_department" class="btn btn-sm btn-info" title="Update">Update</button>
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