@extends('hr.app')
@section('hr-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                    <div class="card">
                        <div class="card-header bg-primary">
                            User Data Edit
                        </div>
                        <div class="card-body colorDesign">
                            @php
                            $v = "single data";
                            @endphp
                            @foreach($userdata as $data)
                            <form action="{{ route('user.hr.update-user',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name *</label>
                                            <input type="text" class="form-control" value="{{$data->Name}}" name="name">
                                            @error('name')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email *</label>
                                            <input type="text" class="form-control" value="{{$data->Email}}" name="email">
                                            @error('email')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone *</label>
                                            <input type="text" class="form-control" value="{{$data->Phone}}" name="phone">
                                            @error('phone')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Gender *</label>
                                            <input type="text" class="form-control" value="{{$data->Gender}}" name="gender">
                                            @error('gender')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">DOB *</label>
                                            <input type="date" class="form-control" value="{{$data->DOB}}" name="dob">
                                            @error('dob')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Course *</label>
                                            <input type="text" class="form-control" value="{{$data->Course}}" name="course">
                                            @error('course')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address *</label>
                                            <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                            @error('address')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">City *</label>
                                            <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                            @error('city')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">State *</label>
                                            <input type="text" class="form-control" name="state" value="{{old('state')}}">
                                            @error('state')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Resume/CV *</label>
                                            <input type="file" class="form-control" name="cv">
                                            @error('cv')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">10th Marksheet *</label>
                                            <input type="file" class="form-control" name="m10th">
                                            @error('m10th')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">12th Marksheet *</label>
                                            <input type="file" class="form-control" name="m12th">
                                            @error('m12th')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 1st Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u1m">
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 2nd Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u2m">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 3rd Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u3m">
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 4th Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u4m">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 5th Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u5m">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ug 6th Sem Marksheet</label>
                                            <input type="file" class="form-control" name="u6m">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Id Proof *</label>
                                            <input type="file" class="form-control" name="idproof">
                                            @error('idproof')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Photo *</label>
                                            <input type="file" name="photo" id="" class="form-control">
                                            @error('photo')
                                            <label for="" class="alert alert-danger">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Call Response *</label>
                                            <select class="form-control" name="callresp">
                                                <option value="Interested">Interested</option>
                                                <option value="Not Interested">Not Interested</option>
                                                <option value="Not Pick">Not Pick</option>
                                                <option value="Switch Off">Switch Off</option>
                                            </select>    
                                
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success mt-3 w-50">Submit</button>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection