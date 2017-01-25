<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('public/')}}/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <li class="header">HEADER</li>

            <li class="{{ url()->current() == url("/dashboard") ? "active" : "" }}"><a href="{{url('/dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Student</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ url()->current() == url("/new-admission") ? "active" : "" }}"><a href="{{url('/new-admission')}}">New Admission</a></li>
                    <li class="{{ url()->current() == url("/student-list") ? "active" : "" }}"><a href="{{url('/student-list')}}">Student List</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('class-management') ? 'active' : ' ' }}">
                <a href="#"><i class="fa fa-link"></i> <span>Academic Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('class-management') ? 'active' : ' ' }}"><a href="{{url('/class-management')}}">CLass Management</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-bank"></i> Account Management
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('account-settings') ? 'active' : ' ' }}">
                        <a href="{{url('account-settings')}}"><i class="fa  fa-cog"></i> Account Settings</a>
                    </li>
                    <li class="{{ Request::is('add-fees') ? 'active' : ' ' }}">
                        <a href="#"><i class="fa  fa-graduation-cap"></i> Student Account
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('add-fees') ? 'active' : ' ' }}"><a href="{{url('add-fees')}}"><i class="fa fa-link"></i> <span>Add Fees</span></a></li>
                            <li class="{{ Request::is('invoice-generate') ? 'active' : ' ' }}"><a href="{{url('invoice-generate')}}"><i class="fa fa-link"></i> <span>Invoice Generate</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Employee Account
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('add-fees') ? 'active' : ' ' }}"><a href="{{url('add-fees')}}"><i class="fa fa-link"></i> <span>Add Fees</span></a></li>
                            <li class="{{ Request::is('invoice-generate') ? 'active' : ' ' }}"><a href="{{url('invoice-generate')}}"><i class="fa fa-link"></i> <span>Invoice Generate</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('student-list') ? 'active' : ' ' }}"><a href="{{url('/student-list')}}"><i class="fa fa-user"></i> <span>Student Lists</span></a></li>
            <li class="{{ Request::is('invoices') ? 'active' : ' ' }}"><a href="{{url('/invoices')}}"><i class="fa fa-gears"></i> <span>Invoices</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>

        </ul>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
