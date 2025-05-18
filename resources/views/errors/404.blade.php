@extends('layouts.error')
@section('title', 'Error - 404 | Page Not Found')
@section('content')
<div class="text-center" style="margin-top: 190px;">
    <div class="error-body">
        <h1 class="error">SOMETHING WENT WRONG</h1>
        <br><br>
        <p><a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Back to dashboard</a></p>
        <p><img src="{{ asset('img/error-img.png') }}" style="vertical-align: middle; max-width: 90%; height: 500px;"></p>
    </div>
</div>
@endsection