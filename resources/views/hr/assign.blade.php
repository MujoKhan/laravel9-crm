@extends('hr.app')
@section('hr-content')
@if(session()->get('r1') == 1)
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
                          Assign User For Round 1
                          
                        </div>
                        @foreach($userdata as $data)
                        <div class="card-body colorDesign">
                          <form action="{{ route('user.hr.round',['id'=>$data->id,'r'=>'r1'])}}" method="post">
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
                              <label for="">Select Inter Viewer For 1st Round</label>
                                <select name="interid" id="" class="form-control">
                                  @foreach($interviewer as $inter)
                                  <option value="{{$inter->id}}">{{$inter->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <input type="hidden" name="userid" value="{{$data->id}}" id="">
                            <button class="btn btn-success mt-3">1st Round</button>
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
@elseif(session()->get('r2') == 1)
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
                          Assign User For Round 2
                          
                        </div>
                        @foreach($userdata as $data)
                        <div class="card-body colorDesign">
                        
                            <form action="{{ route('user.hr.round',['id'=>$data->id,'r'=>'r2'])}}" method="post">
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
                                <label for="">Select Inter Viewer For 2nd Round</label>
                                  <select name="interid" id="" class="form-control">
                                    @foreach($interviewer as $inter)
                                    <option value="{{$inter->id}}">{{$inter->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <input type="hidden" name="userid" value="{{$data->id}}" id="">
                              <button class="btn btn-success mt-3">2nd Round</button>
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
@elseif(session()->get('r3') == 1)
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
                          Assign User For Final Round 
                          
                        </div>
                        @foreach($userdata as $data)
                        <div class="card-body colorDesign">
                        
                            <form action="{{ route('user.hr.round',['id'=>$data->id,'r'=>'r3'])}}" method="post">
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
                                <label for="">Select Inter Viewer For Final Round</label>
                                  <select name="interid" id="" class="form-control">
                                    @foreach($interviewer as $inter)
                                    <option value="{{$inter->id}}">{{$inter->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <input type="hidden" name="userid" value="{{$data->id}}" id="">
                              <button class="btn btn-success mt-3">Final Round</button>
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
@elseif(session()->get('selection') == 1)
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
                          Selection Here
                          
                        </div>
                        @foreach($userdata as $data)
                        <div class="card-body colorDesign">
                      
                            <form action="{{ route('user.hr.round',['id'=>$data->id,'r'=>'selection'])}}" method="post">
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
                                <label for="">User Response for Selection</label>
                                  <select name="selected" id="" class="form-control">
                                    <option value="Selected">Selected</option>
                                    <option value="Not Interested">Not Interested</option>
                                    <option value="Confuse">Confuse</option>  
                                  </select>
                                </div>
                              </div>
                              <input type="hidden" name="userid" value="{{$data->id}}" id="">
                              <button class="btn btn-success mt-3">Selection</button>
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
@endif
@endsection