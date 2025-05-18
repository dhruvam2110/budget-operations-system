
<!-- this is the main HTML section of login panel -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token-login" content="{{ csrf_token() }}">
        <title>Budget | @yield('title')</title>
        @include('partials.login.header_link')
    </head>
    <body>
        @yield('content')
        @include('partials.login.footer')
        @include('partials.login.footer_link')
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