<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user.interviewer.home')}}" class="nav-link">Home</a>
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
                <!-- <a href="#dadmin-profile" rel="modal:open" class="dropdown-item">
                    <i class="fas fa-user"></i></i> View Profile
                </a> -->
                <a href="{{ route('user.interviewer.update')}}" class="dropdown-item">
                    <i class="fas fa-user"></i></i> View Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-cog"></i> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('user.logout')}}" class="dropdown-item">
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

<!-- Modal -->
<!-- <div id="dadmin-profile" class="modal">
      <div class="card mt-3">
        <div class="card-header bg-primary">
            HR Profile Edit
            <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
        </div>
        <div class="card-body colorDesign">         
            @php
            $v = "emp";
            @endphp
            <div class="row">
                <div class="col-md-4 offset-md-4">
                  @if(session()->get('emp-dp')!= "")
                  @php
                  $dp = session()->get('emp-dp');
                  @endphp
                  <div class="image">
                      <img src="{{ asset('dp/'.$dp)}}" class="img-circle elevation-2" width="50%" height="50%" alt="User Image">
                  </div>
                  @else
                  <div class="image">
                      <img src="{{ asset('dist/img/user2-160x160.jpg')}}"  width="50%" height="50%" class="img-circle elevation-2" alt="User Image">
                  </div>
                  @endif
                </div>  
          </div>
            <form action="{{ url('inter-update')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" value="{{session()->get('emp-id')}}" name="id" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{session()->get('emp-email')}}" name="email" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{session()->get('emp-name')}}" name="name">
                            @error('name')
                                    <label for="" class="text-danger">{{$message}}</label>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" value="{{session()->get('emp-password')}}" name="password">
                            @error('password')
                                    <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                 </div> 
                 <div class="row">
                    <div class="col-md-6">     
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" value="{{session()->get('emp-phone')}}" name="phone">
                            @error('phone')
                                    <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>        
                        <label for="">Upload DP</label>
                        <input type="file" class="form-control" name="dp">
                        <input type="hidden" name="empid" id="" value="{{session()->get('emp-pid')}}">
                <button class="btn btn-success mt-1">Submit</button>
            </form>
        </div>
    </div>
</div> -->
<!-- close modal -->