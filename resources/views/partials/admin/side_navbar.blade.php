
<!-- this is the side navigation panel of the project -->
<div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
        <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
                <ul class="sidenav">
                    <li class="sidenav-item {{ Request::is('*dashboard') ? 'active open' : '' }}">
                        <a href="{{route('admin.dashboard')}}" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-home"></span>
                            <span class="sidenav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidenav-item has-subnav {{ Request::is('*employee*') ? 'active open' : '' }}">
                        <a href="{{route('admin.addEmployee')}}" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-user"></span>
                            <span class="sidenav-label">Employees</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Employees</li>
                            <li class="{{ Request::is('*add-employee') ? 'active open' : '' }}"><a href="{{route('admin.addEmployee')}}">Add Employee</a></li>
                            <li class="{{ Request::is('*list-employee') ? 'active open' : '' }}"><a href="{{route('admin.listEmployee')}}">Employee List</a></li>
                        </ul>
                    </li>
                    <li class="sidenav-item has-subnav {{ Request::is('*department') ? 'active open' : '' }}">
                        <a href="{{route('admin.addDepartment')}}" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-institution"></span>
                        <span class="sidenav-label">Departments</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Departments</li>
                            <li class="{{ Request::is('*add-department') ? 'active open' : '' }}"><a href="{{route('admin.addDepartment')}}">Add Department</a></li>
                            <li class="{{ Request::is('*list-department') ? 'active open' : '' }}"><a href="{{route('admin.listDepartment')}}">Department List</a></li>
                        </ul>
                    </li>
                    <li class="sidenav-item has-subnav {{ Request::is('*budget-amount') ? 'active open' : '' }}">
                        <a href="{{route('admin.addBudgetAmount')}}" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-money"></span>
                        <span class="sidenav-label">Budget Amount</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Budget Amount</li>
                            <li class="{{ Request::is('*add-budget-amount') ? 'active open' : '' }}"><a href="{{route('admin.addBudgetAmount')}}">Add Budget Amount</a></li>
                            <li class="{{ Request::is('*list-budget-amount') ? 'active open' : '' }}"><a href="{{route('admin.listBudgetAmount')}}">Budget Amount List</a></li>
                        </ul>
                    </li>
                    <li class="sidenav-item has-subnav {{ Request::is('*sponsor*') ? 'active open' : '' }}">
                        <a href="{{route('admin.addSponsor')}}" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-inr"></span>
                        <span class="sidenav-label">Sponsors</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Sponsors</li>
                            <li class="{{ Request::is('*add-sponsor') ? 'active open' : '' }}"><a href="{{route('admin.addSponsor')}}">Add Sponsor</a></li>
                            <li class="{{ Request::is('*list-sponsor') ? 'active open' : '' }}"><a href="{{route('admin.listSponsor')}}">Sponsor List</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>