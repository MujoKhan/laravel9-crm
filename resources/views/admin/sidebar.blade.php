<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- <aside class="main-sidebar elevation-4 colorDesign"> -->

    <!-- Brand Logo -->
    <a href="{{ route('admin.home')}}" class="brand-link">
        <img src="{{ asset('background/crmicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(Auth::guard('admin')->user()->dp != "")
            @php
            $dp = Auth::guard('admin')->user()->dp;
            @endphp
            <div class="image">
                <img src="{{ asset('dp/'.$dp)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @else
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @endif
            <div class="info">
                <a href="{{ route('admin.home')}}" class="d-block">{{ Auth::guard('admin')->user()->email}}</a>
            </div>
        </div>

      
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-users"></i>
                        <p>
                            HR
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                            $hr = "HR";
                            @endphp

                            <a href="{{ route('admin.emp',['v'=>$hr])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>All HR</p>
                            </a>
                        </li>
                    </ul>
                </li>   
                
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-users"></i>
                        <p>
                        Inter Viewer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @php
                            $inter = "Inter Viewer";
                    @endphp
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.emp',['v'=>$inter])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>All Inter Viewer</p>
                            </a>
                        </li>
                    </ul>
                </li>   

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-users"></i>
                        <p>
                            Data Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @php
                      $dadmin = "Data Admin";
                    @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.emp',['v'=>$dadmin])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>All Data Admin</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-users"></i>
                        <p>
                            Add And Approve
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                      
                        <li class="nav-item">
                            <a href="{{ route('admin.add')}}" class="nav-link">
                            <i class="fas fa-user-plus"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @php
                        $show = "show";
                        $trash = "trash";
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.emp',['v'=>'show'])}}" class="nav-link">
                            
                            <i class="fas fa-eye"></i>
                                <p>Approve</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.emp',['v'=>'trash'])}}" class="nav-link">
                            <i class="fas fa-trash"></i>
                                <p>Trash</p>
                            </a>
                        </li>
                    </ul>
                </li> 
            </ul>
        </nav>
        
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>