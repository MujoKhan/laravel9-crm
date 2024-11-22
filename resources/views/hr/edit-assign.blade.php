@extends('hr.app')
@section('hr-content')

@if(session()->get('edithr') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Work</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if(session('status') && session('status')!="")
              <div class="alert alert-success">
                {{session('status')}}
              </div>
              @endif
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Call Status</th>
                    <th>Inter R1</th>
                    <th>Edit</th>
                    <th>Assign</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Call_Response == "Interested")
                        <td>{{$data->Call_Response}}</td>
                            @if($data->Inter_Id_R1 != "")
                                    @foreach($emp as $data1)
                                    @if($data->Inter_Id_R1 == $data1->id)
                                    <td>{{$data1->email}}</td>
                                    @endif
                                    @endforeach
                            @else
                            <td></td>
                            @endif   
                        <td>
                          <a href="{{ route('user.hr.edit-user',['id'=>$data->id])}}">
                            <button type="button" class="btn btn-success" id="edit"
                              value=""><i class="fas fa-user-edit"></i></button></a>
                        </td>
                        <!-- <td><a href="#assign{{$data->id}}" rel="modal:open""><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td> -->
                        <td><a href="{{ route('user.hr.user-assign',['id'=>$data->id, 'v'=>'r1'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
                    @else
                    <td>{{$data->Call_Response}}</td>
                    <td></td>
                    <td><a href="{{ route('user.hr.edit-user',['id'=>$data->id])}}">
                            <button type="button" class="btn btn-success" id="edit"
                              value=""><i class="fas fa-user-edit"></i></button></a>
                    </td>
                    <td>Cant Assign</td>
                    @endif
                  </tr>
                 

                  <!-- Modal assign -->
                  <!-- <div id="assign{{$data->id}}" class="modal">
                   <div class="card mt-3">
                      <div class="card-header bg-primary">
                        Assign User
                        <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
                      </div>
                      <div class="card-body colorDesign">
                        <form action="{{ url('hr-user-round',['id'=>$data->id,'r'=>'r1'])}}" method="post">
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
                                <option value="{{$inter->id}}">{{$inter->Emp_Name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <input type="hidden" name="userid" value="{{$data->id}}" id="">
                          <button class="btn btn-success mt-3">1st Round</button>
                        </form>
                      </div>
                    </div>
                  </div> -->
                  <!-- close modal -->
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('r1') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Round 1</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if(session('status') && session('status')!="")
              <div class="alert alert-success">
                {{session('status')}}
              </div>
              @endif
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Inter R2</th>
                    <th>Result R1</th>
                    <th>Assign</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if($data->Call_Response == "Interested")
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Inter_Id_R2 != "")
                     @foreach($emp as $emp1)
                      @if($data->Inter_Id_R2 == $emp1->id)
                      <td>{{$emp1->email}}</td>
                      @endif
                     @endforeach
                    @else
                    <td></td>
                    @endif
                    @if($data->R1_Result !="" && $data->R1_Result == "Completed")
                    <td>{{$data->R1_Result}}</td>
                    <!-- <td><a href="#assign{{$data->id}}" rel="modal:open""><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td> -->
                    <td><a href="{{ route('user.hr.user-assign',['id'=>$data->id, 'v'=>'r2'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
                    @elseif($data->R1_Result !="" && $data->R1_Result == "Pending")
                    <td>{{$data->R1_Result}}</td>
                    <td>Not Done</td>
                    @elseif($data->R1_Result == "Not Completed")
                    <td>{{$data->R1_Result}}</td>
                    <td>Sorry</td>
                    @else
                    <td></td>
                    <td>Processing...</td>
                    @endif
        
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('r2') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Round 2</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if(session('status') && session('status')!="")
              <div class="alert alert-success">
                {{session('status')}}
              </div>
              @endif
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Inter Final</th>
                    <th>Result R2</th>
                    <th>Assign</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if(($data->R1_Result == "Completed") && ($data->Call_Response == "Interested"))
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Inter_Id_R3 != "")
                     @foreach($emp as $emp1)
                      @if($data->Inter_Id_R3== $emp1->id)
                      <td>{{$emp1->email}}</td>
                      @endif
                     @endforeach
                    @else
                    <td></td>
                    @endif
                    @if($data->R2_Result == "Completed")
                    <td>{{$data->R2_Result}}</td>
                    <!-- <td><a href="#assign{{$data->id}}" rel="modal:open""><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td> -->
                    <td><a href="{{ route('user.hr.user-assign',['id'=>$data->id, 'v'=>'r3'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
                    @elseif($data->R2_Result == "Pending")
                    <td>{{$data->R2_Result}}</td>
                    <td>Processing...</td>
                    @elseif($data->R2_Result == "Not Completed")
                    <td>{{$data->R2_Result}}</td>
                    <td>Sorry</td>
                    @else
                    <td></td>
                    <td>Processing...</td>
                    @endif
                    
                  </tr>
                  @endif

                  <!-- Modal assign -->
                  <!-- <div id="assign{{$data->id}}" class="modal">
                   <div class="card mt-3">
                      <div class="card-header bg-primary">
                        Assign User
                        <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
                      </div>
                      <div class="card-body colorDesign">
                        
                        <form action="{{ url('hr-user-round',['id'=>$data->id,'r'=>'r3'])}}" method="post">
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
                                <option value="{{$inter->id}}">{{$inter->Emp_Name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <input type="hidden" name="userid" value="{{$data->id}}" id="">
                          <button class="btn btn-success mt-3">Final Round</button>
                        </form>
                      </div>
                    </div>
                  </div> -->
                  <!-- close modal -->
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('r3') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Final Round! Select Candidate Here</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Result Final Round</th>
                    <th>Status</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if(($data->R1_Result == "Completed") && ($data->R2_Result == "Completed") && ($data->Call_Response == "Interested"))
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->R3_Result == "Completed")
                        <td>{{$data->R3_Result}}</td>
                        <td>{{$data->Select_Status}}</td>
                        <!-- <td><a href="#assign{{$data->id}}" rel="modal:open""><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td> -->
                        <td><a href="{{ route('user.hr.user-assign',['id'=>$data->id, 'v'=>'selection'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
                    @elseif($data->R3_Result !="" && $data->R3_Result == "Pending")
                        <td>{{$data->R3_Result}}</td>
                        <td>{{$data->Select_Status}}</td>
                        <td>Not Done</td>
                    @elseif($data->R3_Result == "Not Completed")
                        <td>{{$data->R3_Result}}</td>
                        <td>{{$data->Select_Status}}</td>
                        <td>Sorry</td>
                    @else
                    <td></td>
                    <td>{{$data->Select_Status}}</td>
                    <td>Processing...</td>
                    @endif
                    
                  </tr>
                  @endif

                  <!-- Modal assign -->
                  <!-- <div id="assign{{$data->id}}" class="modal">
                   <div class="card mt-3">
                      <div class="card-header bg-primary">
                        Selection Of User
                        <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
                      </div>
                      <div class="card-body colorDesign">
                      
                        <form action="{{ url('hr-user-round',['id'=>$data->id,'r'=>'selection'])}}" method="post">
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
                            <label for="">Select Inter Viewer For Select</label>
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
                    </div>
                  </div> -->
                  <!-- close modal -->
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('selected') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Selected Candidate</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if(($data->R1_Result == "Completed") && ($data->R2_Result == "Completed") && ($data->R3_Result == "Completed") && ($data->Call_Response == "Interested") && ($data->Select_Status == "Selected"))
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Select_Status != "" )
                    <td>{{$data->Select_Status}}</td>
                    
                    @else
                    <td>Pending</td>
                   
                    @endif
                  </tr>
                
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('off') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Phone Switch Off</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Call Response</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if(($data->Call_Response == "Not Pick") || ($data->Call_Response == "Switch Off"))
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    <td>{{$data->Call_Response}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('notinterested') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Not Interested</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Call Response</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  @if($data->Call_Response == "Not Interested")
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    <td>{{$data->Call_Response}}</td>                    
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@elseif(session()->get('all') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Candidates</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Call Response</th>
                    <th>Select Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Call_Response !="")
                    <td>{{$data->Call_Response}}</td>
                    @else
                    <td>Pending</td>
                    @endif
                    @if($data->Select_Status !="")
                    <td>{{$data->Select_Status}}</td>
                    @else
                    <td>Pending</td>

                    @endif
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endif
@endsection
