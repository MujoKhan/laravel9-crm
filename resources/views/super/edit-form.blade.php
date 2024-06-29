@extends('super.app')
@section('super-form-content')
@if(session()->get('adminedit') == 1)
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
                <div class="card">
                    <div class="card-header bg-primary">
                        Admin Update
                    </div>
                    <div class="card-body colorDesign">
                        @php
                        $v = "admin";
                        @endphp
                        @foreach($admin as $data)
                        <form action="{{ route('super.update',['v'=>$v])}}" method="post">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control" value="{{$data->id}}" name="id" readonly>
                            </div> -->
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{$data->email}}" name="email"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{$data->name}}" name="name">
                                @error('name')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group d-none">
                                <label for="">Password</label>
                                <input type="text" class="form-control" value="{{$data->password}}"
                                    name="password" readonly>
                                @error('password')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <input type="hidden" name="adminkey" value="{{$data->id}}">
                            <button class="btn btn-success">Upate</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@elseif(session()->get('superadminedit') == 1)
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
                <div class="card">
                    <div class="card-header bg-primary">
                        Super Admin Profile
                    </div>
                    <div class="card-body colorDesign">
                        @php
                        $v = "super admin";
                        @endphp
                        <form action="{{ route('super.update',['v'=>$v])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control" value="{{Auth::guard('super')->user()->id}}" name="id" readonly>
                            </div> -->
                            <input type="hidden" class="form-control" value="{{Auth::guard('super')->user()->id}}" name="id" readonly>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{Auth::guard('super')->user()->email}}" name="email"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{Auth::guard('super')->user()->name}}" name="name">
                                @error('name')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" value="{{Auth::guard('super')->user()->password}}" name="password" readonly>
                                @error('password')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div> -->
                            <button class="btn btn-success mt-1">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@endif
@endsection