
<!-- this is the main HTML section of the dashboard panel -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Budget | @yield('title')</title>
        @include('partials.admin.header_link')
    </head>
    <body class="layout layout-header-fixed layout-sidebar-fixed">
        <div class="layout-header">
            @include('partials.admin.top_navbar')
        </div>
        <div class="layout-main">
            @include('partials.admin.side_navbar')
            @yield('content')
            @include('partials.admin.footer')
        </div>
        @include('partials.admin.footer_link')
    </body>
</html>

<!-- toastr javascript -->
<script type="text/javascript">
@if(Session::has('messages'))
    $(document).ready(function() {
        @foreach(Session::get('messages') AS $msg) 
            toastr['{{ $msg["type"] }}']('{{$msg["message"]}}','{{ $msg["title"] }}');
        @endforeach
    });
@endif
    
@if (count($errors) > 0) 
    $(document).ready(function() {
        @foreach($errors->all() AS $error)
            toastr['error']('{{$error}}');
        @endforeach     
    });
@endif
</script>