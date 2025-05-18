
<!-- this is the top navigation panel of the project -->
<div class="layout-header">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <a href="{{ route('admin.dashboard') }}"><img class="navbar-brand-logo" src="{{asset('img/Logo.png')}}" alt="Veeda Clinical Research" style="height: 50px; width: 115px; margin-left: 50px;"></a>
        </div>
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
                    <span class="sr-only">Toggle navigation</span>
                        <span class="bars">
                            <span class="bar-line bar-line-1 out"></span>
                            <span class="bar-line bar-line-2 out"></span>
                            <span class="bar-line bar-line-3 out"></span>
                            <span class="bar-line bar-line-4 in"></span>
                            <span class="bar-line bar-line-5 in"></span>
                            <span class="bar-line bar-line-6 in"></span>
                        </span>
                </button>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                            @if(Auth::guard('admin')->user()->image)
                            <img class="rounded" src="{{asset('/ProfilePicture/'.Auth::guard('admin')->user()->image)}}" width="36" height="36" style="border-radius: 50%">
                            @endif {{Auth::guard('admin')->user()->name}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{route('admin.editProfile')}}">Edit Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('admin.changePassword')}}">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('admin.logout')}}">Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
