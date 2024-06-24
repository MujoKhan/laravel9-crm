@extends('dataadmin.app')
@section('dataadmin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Content Header (Page header) -->
    <div class="content-header" class="table table-bordered table-striped">
            
            <div class="row" >
                <div class="col-md-8 offset-md-2">
                @if(session('status') && session('status')!= "")
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
                    <div class="card" class="table table-bordered table-striped">
                        <div class="card-header bg-primary">
                            Single Data
                        </div>
                        <div class="card-body colorDesign">
                            @php 
                            $v = "single data";
                            @endphp
                            <form action="{{ route('user.dataadmin.add-data',['id'=>Auth::guard('emp')->user()->id, 'v'=>$v])}}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">DOB</label>
                                    <input type="date" class="form-control" name="dob" value="{{old('dob')}}">
                                    
                                    @error('dob')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <input type="text" class="form-control" name="course" value="{{old('course')}}">
                                    @error('course')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="other" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Other
                                    </label>
                                </div>
                                @error('gender')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                
                                <button class="btn btn-success mt-3 w-25">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="card" class="table table-bordered table-striped">
                        <div class="card-header bg-primary">
                            Upload Sheet
                        </div>
                        <div class="card-body colorDesign">
                        @php 
                            $v1 = "bunk data";
                        @endphp
                            <form action="{{ route('user.dataadmin.add-data',['id'=>Auth::guard('emp')->user()->id, 'v'=> $v1])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Excel Sheet</label>
                                    <label for="">Note:- It is not working because laravel changed the version 8 to 9 it will fix later</label>
                                    <input type="file"  id="" name="excelsheet" class="form-control">
                                    <label for=""><strong class="text-warning">Note:- Upload Same File 2 Times</strong></label>
                                </div>
                                
                                <button class="btn btn-success w-25">Upload</button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection