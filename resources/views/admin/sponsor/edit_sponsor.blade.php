@extends('layouts.admin')
@section('title', 'Edit Sponsor')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <center>
                    <span class="d-ib">Edit Sponsor</span>
                </center>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="demo form-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="color: red; text-align: right;">* is mandatory.</h5>
                            <form method="POST" id="edit_sponsor_form" action="{{route('admin.updateSponsor')}}" data-toggle="validator" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $sponsor->id }}">
                                <div class="form-group">
                                    <label for="sponsor_name" class="control-label">Sponsor Name <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Sponsor Name" value="{{ $sponsor->sponsor_name }}" id="sponsor_name" class="form-control" type="text" name="sponsor_name" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="drug_name" class="control-label">Drug Name <span class="mandatory">*</span></label>
                                    <input placeholder="Enter the Drug Name" value="{{ $sponsor->drug_name }}" id="drug_name" class="form-control" type="text" name="drug_name" maxlength="50">
                                </div>
                                <div class="form-group">
                                        <label for="study_year" class="control-label">Financial Year <span class="mandatory">*</span></label>
                                        <select class="form-control year" name="study_year" id='study_year'>
                                            <option class="year-opt" value="{{ $sponsor->study_year }}" hidden>{{ $sponsor->study_year }}</option>
                                            @for($prev_year = 2030; $prev_year >= 2006; $prev_year--)
                                                @php
                                                    $first_year = substr($prev_year, -2);
                                                @endphp
                                                <option class="year-opt" value="{{ $prev_year - 1 }} - {{ $first_year }}">{{ $prev_year - 1 }} - {{ $first_year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="study_revenue" class="control-label">Study Revenue<span class="mandatory">*</span></label>
                                    <div class="input-with-icon">
                                        <input placeholder="Enter the Study Revenue" value="{{ $sponsor->study_revenue }}" class="form-control number" name="study_revenue" id="number" type="text" maxlength="11">
                                        <span class="icon icon-inr input-icon"></span>
                                    </div>
                                </div>
                                <!-- btn-block -->
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-info pull-center" title="Update">Update</button>
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