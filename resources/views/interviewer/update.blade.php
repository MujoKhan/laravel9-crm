@extends('interviewer.app')
@section('interviewer-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header" class="table table-bordered table-striped">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if(session('status') && session('status')!= "")
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <div class="card-header bg-primary">
            Inter Viewer Profile Edit
            <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
        </div>
        <div class="card-body colorDesign">         
            @php
            $v = "emp";
            @endphp
            <div class="row">
                <div class="col-md-4 offset-md-4">
                  @if(Auth::guard('emp')->user()->dp!= "")
                  @php
                  $dp = Auth::guard('emp')->user()->dp;
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
            <form action="{{ route('user.interviewer.profile')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->id}}" name="id" readonly>
                        </div>
                    </div> -->
                    <input type="hidden" class="form-control" value="{{Auth::guard('emp')->user()->id}}" name="id" readonly>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->email}}" name="email" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">     
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->phone}}" name="phone">
                            @error('phone')
                                    <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <!-- <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->password}}" name="password" readonly>
                            @error('password')
                                    <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div> -->
                 </div> 
                 <div class="row">
                    
                    <div class="col-md-6">     
                        <div class="form-group">
                        <label for="">Upload DP</label>
                        <input type="file" class="form-control" name="dp">
                        </div>
                    </div>
                    <div class="col-md-6">     
                        <div class="form-group">
                            <label for="">Gender</label>
                            <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->gender}}" name="gender">
                            @error('gender')
                                    <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>   
                <!-- <div class="row">
                    
                </div>         -->
                        
                        <input type="hidden" name="empid" id="" value="{{Auth::guard('emp')->user()->id}}">
                <button class="btn btn-success mt-1">Submit</button>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection