<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- <aside class="main-sidebar elevation-4 colorDesign"> -->

    <!-- Brand Logo -->
    <a href="{{ route('super.home')}}" class="brand-link">
        <img src="{{ asset('background/crmicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
         
            <div class="info">
                <a href="{{ route('super.home')}}" class="d-block">{{ Auth::guard('super')->user()->email }}</a>
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
                        {{ Auth::guard('super')->user()->name }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                            $v = "add";
                            @endphp

                            <a href="{{ route('super.task',['v'=>$v])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                            $v = "edit";
                            @endphp

                            <a href="{{ route('super.task',['v'=>$v])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>Edit & Delete Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                            $v = "trash";
                            @endphp

                            <a href="{{ route('super.task',['v'=>$v])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>Trash Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                            $v = "all";
                            @endphp

                            <a href="{{ route('super.task',['v'=>$v])}}" class="nav-link">
                            <i class="fas fa-user"></i>
                                <p>Show All Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>   
                
                
                
                
                
                        
                    </ul>
                </li> 
            </ul>
        </nav>
        
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>