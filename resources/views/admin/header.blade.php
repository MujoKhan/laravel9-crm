<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('admin-home')}}" class="nav-link">Home</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Profile</span>
                <div class="dropdown-divider"></div>
                <!-- <a href="#admin-profile" rel="modal:open" class="dropdown-item">
                    <i class="fas fa-user"></i></i> View Profile
                </a> -->
                <a href="{{ route('admin.edit',['id'=>Auth::guard('admin')->user()->id,'v'=>'admin'])}}" class="dropdown-item">
                    <i class="fas fa-user"></i></i> View Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog"></i> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout')}}" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i> LogOut
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
