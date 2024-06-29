@extends('admin.app')
@section('admin-content')
@if(session()->get('empedit') == 1)
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
                        Employee Edit

                    </div>
                    <div class="card-body colorDesign">
                        @php
                        $v = "emp";
                        @endphp
                        @foreach($emp as $data)
                        <form action="{{ route('admin.update',['v'=>$v])}}" method="post">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control" value="{{$data->id}}" name="id" readonly>
                            </div> -->
                            <input type="hidden" class="form-control" value="{{$data->id}}" name="id" readonly>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{$data->email}}" name="email" readonly>
                            </div>
                            <!-- <input type="hidden" class="form-control" value="{{$data->email}}" name="email" readonly> -->
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{$data->name}}" name="name">
                                @error('name')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" value="{{$data->password}}" name="password" readonly>
                                @error('password')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div> -->
                            <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" class="form-control" value="{{$data->gender}}" name="gender">
                                @error('gender')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <button class="btn btn-success">Submit</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@elseif(session()->get('adminedit') == 1)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header" class="table table-bordered table-striped">

        <div class="row">

            <div class="col-md-8 offset-md-2">
                @if(session('status') && session('status')!= "")
                <div class="alert alert-warning">
                    {{session('status')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary">
                         Admin Profile Edit

                    </div>
                    <div class="card-body colorDesign">
                        @php
                        $v = "admin";
                        @endphp
                        <form action="{{ route('admin.update',['v'=>$v])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->id}}" name="id"
                                    readonly>
                            </div> -->
                            <input type="hidden" class="form-control" value="{{Auth::guard('admin')->user()->id}}" name="id"
                                    readonly>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}"
                                    name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->name}}"
                                    name="name">
                                @error('name')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->password}}"
                                    name="password" readonly>
                                @error('password')
                                <label for="" class="text-danger">{{$message}}</label>
                                @enderror
                            </div>
                            

                            <label for="">Upload DP</label>
                            <input type="file" class="form-control" name="dp">

                            <button class="btn btn-success mt-3">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@endif
@endsection