<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- <aside class="main-sidebar elevation-4 colorDesign"> -->

    <!-- Brand Logo -->
    <a href="{{ route('user.dataadmin.home')}}" class="brand-link">
        <img src="{{ asset('background/crmicon.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(Auth::guard('emp')->user()->dp!= "")
            @php
            $dp = Auth::guard('emp')->user()->dp;
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
                <a href="{{ route('user.dataadmin.home')}}" class="d-block">{{ Auth::guard('emp')->user()->email}}</a>
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
                            {{ Auth::guard('emp')->user()->name}}  (Data Admin)
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.dataadmin.add')}}" class="nav-link">
                                <i class="fas fa-user-plus "></i>
                                <p class="">Add Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.dataadmin.show',['id'=>Auth::guard('emp')->user()->id, 'v'=> 'edit'])}}" class="nav-link">
                                <i class="fas fa-user-edit "></i>
                                <p class="">Edit & Assign</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.dataadmin.show',['id'=>Auth::guard('emp')->user()->id, 'v'=>'show'])}}" class="nav-link">
                                <i class="fas fa-eye "></i>
                                <p class="">Show Data</p>
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