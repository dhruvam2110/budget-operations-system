
<!-- this is the main HTML section of the dashboard panel -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Budget | @yield('title')</title>
        @include('partials.error.header_link')
    </head>
    <body>
        <div class="layout-main">
            @yield('content')
        </div>
        @include('partials.error.footer_link')
    </body>
</html>