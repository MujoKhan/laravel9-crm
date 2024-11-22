@extends('dataadmin.app')
@section('dataadmin-content')
@if(session()->get('edit') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                    <div class="card-header bg-primary">
                        Edit User
                        
                      </div>
                      <div class="card-body colorDesign">
                        @php
                        $v = "emp";
                        @endphp
                        @foreach($userdata as $data)
                        <form action="{{ route('user.dataadmin.update',['id'=>$data->id, 'v'=>'user'])}}" method="post">
                          @csrf
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Email *</label>
                                  <input type="text" class="form-control" value="{{$data->Email}}" name="email" >
                                  @error('email')
                                  <label for="" class="text-danger">{{$message}}</label>
                                  @enderror
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name *</label>
                                    <input type="text" class="form-control" value="{{$data->Name}}" name="name" >
                                    @error('name')
                                    <label for="" class="text-danger">{{$message}}</label>
                                    @enderror
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Phone *</label>
                                  <input type="text" class="form-control" value="{{$data->Phone}}" name="phone" >
                                  @error('phone')
                                  <label for="" class="text-danger">{{$message}}</label>
                                  @enderror
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" class="form-control" value="{{$data->DOB}}" name="dob" >
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Gender</label>
                                  <input type="text" class="form-control" value="{{$data->Gender}}" name="gender" >
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <input type="text" class="form-control" value="{{$data->Course}}" name="course" >
                                </div>
                              </div>
                          </div>
                          <input type="hidden" name="userid"  value="{{$data->id}}">
                          <button class="btn btn-success">Submit</button>
                        </form>
                      </div>
                        @endforeach()
                      </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>  
@elseif(session()->get('assign') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                    <div class="card-header bg-primary">
                        Assign User
                        
                      </div>
                      <div class="card-body colorDesign">
                        @php
                        $v = "emp";
                        @endphp
                        @foreach($userdata as $data)
                        <form action="{{ route('user.dataadmin.assign',['id'=>$data->id])}}" method="post">
                          @csrf
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="text" class="form-control" value="{{$data->Email}}" name="id" >
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="{{$data->Name}}" name="name" >
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Phone</label>
                                  <input type="text" class="form-control" value="{{$data->Phone}}" name="id" >
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="text" class="form-control" value="{{$data->DOB}}" name="name" >
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="">Gender</label>
                                  <input type="text" class="form-control" value="{{$data->Gender}}" name="id" >
                               </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <input type="text" class="form-control" value="{{$data->Course}}" name="name" >
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                            <label for="">Select HR To Assign</label>
                              <select name="hrid" id="" class="form-control">
                                @foreach($emp as $data1)
                                <option value="{{$data1->id}}">{{$data1->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <input type="hidden" name="userid" value="{{$data->id}}" id="">
                          <button class="btn btn-success mt-3">Assign</button>
                        </form>
                        @endforeach()
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> 
 @elseif(session()->get('dataadmin') == 1)
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
                    Data Admin Profile Edit
                    
                </div>
                <div class="card-body colorDesign">
                    @php
                    $v = "emp";
                    @endphp
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            @if( Auth::guard('emp')->user()->dp!= "")
                            @php
                            $dp = Auth::guard('emp')->user()->dp;
                            @endphp
                            <div class="image">
                                <img src="{{ asset('dp/'.$dp)}}" class="img-circle elevation-2" width="50%" height="50%"
                                    alt="User Image">
                            </div>
                            @else
                            <div class="image">
                                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" width="50%" height="50%"
                                    class="img-circle elevation-2" alt="User Image">
                            </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('user.dataadmin.update',['id'=>Auth::guard('emp')->user()->id, 'v'=>'data admin'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->id}}"
                                        name="id" readonly>
                                </div>
                               
                            </div> -->
                            <input type="hidden" class="form-control" value="{{Auth::guard('emp')->user()->id}}"
                            name="id" readonly>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->email}}"
                                        name="email" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->name}}"
                                        name="name">
                                    @error('name')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->password}}"
                                        name="password" readonly>
                                    @error('password')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->phone}}"
                                        name="phone">
                                    @error('phone')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Upload DP</label>
                                    <input type="file" class="form-control" name="dp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <input type="text" class="form-control" value="{{Auth::guard('emp')->user()->gender}}"
                                        name="gender">
                                    @error('gender')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="empid" id="" value="{{Auth::guard('emp')->user()->id}}">
                        <button class="btn btn-success mt-1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection