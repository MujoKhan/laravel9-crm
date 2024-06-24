@extends('admin.app')
@section('admin-content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper colorDesign">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-8 offset-md-2 " style="opacity: 0.8">
                    @if(session('status') && session('status')!= "")
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-primary">
                            Add New Employee
                        </div>
                        <div class="card-body colorDesign">
                            <form action="{{ route('admin.add-emp')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select name="emprole" id="" class="form-control">
                                        <option>Select Role :-</option>
                                        <option value="HR">HR</option>
                                        <option value="Inter Viewer">Inter Viewer</option>
                                        <option value="Data Admin">Data Admin</option>
                                    </select>
                                    @error('emorole')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter name" name="name">
                                    @error('name')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email">
                                    @error('email')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="phone">
                                    @error('phone')
                                    <div for="" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" name="password">
                                    @error('password')
                                    <div for="" class="text-danger">{{$message}}</div>
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
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success" name="">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
<!-- /.col -->

@endsection