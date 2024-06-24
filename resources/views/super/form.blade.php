@extends('super.app')
@section('super-form-content')
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
                            Add Admin
                        </div>
                        <div class="card-body colorDesign">
                            
                        <form action="{{ route('super.add')}}" method="post">
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
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password" >
                                    @error('password')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-success mt-3 w-25">Submit</button>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection