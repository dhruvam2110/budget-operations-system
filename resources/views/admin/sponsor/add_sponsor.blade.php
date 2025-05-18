@extends('layouts.admin')
@section('title', 'Add Sponsor')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center>
                    <span class="d-ib">Add Sponsor</span>
                </center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <form method="POST" id="add_sponsor_form" action="{{route('admin.saveSponsor')}}" data-toggle="validator">
                                @csrf
                                <div class="form-group">
                                    <label for="sponsor_name" class="control-label">Sponsor Name <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Sponsor Name" id="sponsor_name" class="form-control" type="text" name="sponsor_name" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="drug_name" class="control-label">Drug Name <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Drug Name" id="drug_name" class="form-control" type="text" name="drug_name" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="study_year" class="control-label">Financial Year <span class="mandatory">*</span></label>
                                    <select class="form-control year" name="study_year" id='study_year'>
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
                                    <label for="study_revenue" class="control-label">Study Revenue <span class="mandatory">*</span></label>
                                    <div class="input-with-icon">
                                        <input type="text" name="study_revenue" placeholder="Enter the Study Revenue" class="form-control number" maxlength="11">
                                        <span class="icon icon-inr input-icon"></span>
                                    </div>
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                    <center>
                                        <button type="submit" name="action" value="add_sponsor" class="btn btn-info pull-center" title="Save">Save</button>
                                        <button type="submit" name="action" value="save_add_sponsor" class="btn btn-primary pull-center" title="Save and Add New">Save & Add New</button>
                                        <a href="{{route('admin.listSponsor')}}"><button type="button" name="action" value="cancel" class="btn btn-danger pull-center" title="Cancel">Cancel</button></a>
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
@endsection