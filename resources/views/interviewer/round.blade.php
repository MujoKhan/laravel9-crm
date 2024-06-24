@extends('interviewer.app')
@section('interviewer-content')

@if(session()->get('r1') == 1)
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
                    <th>HR</th>
                    <th>Result</th>
                    <th>Round 1</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata_r1 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Hr_Id!="")
                     @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                       <td>{{ $empdata->email}}</td>
                       @endif
                      @endforeach
                    @else
                    <td></td>
                    @endif   
                    <td>{{$data->R1_Result}}</td>
                    <td><a href="{{ route('user.interviewer.interview',['id'=>$data->id,'r'=>'r1'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
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
              <table id="example2" class="table table-bordered table-hover colorDesign">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>HR</th>
                    <th>Result</th>
                    <th>Round 2</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata_r2 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Hr_Id!="")
                     @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                       <td>{{ $empdata->email}}</td>
                       @endif
                      @endforeach
                    @else
                    <td></td>
                    @endif   
                    <td>{{$data->R2_Result}}</td>
                    <td><a href="{{ route('user.interviewer.interview',['id'=>$data->id,'r'=>'r2'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>
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
@elseif(session()->get('r3') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Final Round</h3>
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
                    <th>HR</th>
                    <th>Result</th>
                    <th>Final</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata_r3 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    <td>{{$data->Course}}</td>
                    @if($data->Hr_Id!="")
                     @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                       <td>{{ $empdata->email}}</td>
                       @endif
                      @endforeach
                    @else
                    <td></td>
                    @endif   
                    <td>{{$data->R3_Result}}</td>
                    <td><a href="{{ route('user.interviewer.interview',['id'=>$data->id,'r'=>'r3'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></button></a></td>

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

@elseif(session()->get('all') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Candidate's Round</h3>
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
                    <th>Round</th>
                    <th>Result</th>
                    <th>HR Email</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata_r1 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                 
                    @if($data->Round_1!="")
                    <td>1</td>
                    @else
                    <td></td>
                    @endif
                    @if($data->R1_Result!="")
                    <td>{{$data->R1_Result}}</td>
                    @else
                    <td></td> 
                    @endif 
                    @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                      <td>{{$empdata->email}}</td> 
                      @endif   
                    @endforeach               
                  </tr>

                  @endforeach
                  @foreach($userdata_r2 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    @if($data->Round_2!="")
                    <td>2</td>
                    @else
                    <td></td>
                    @endif
                    @if($data->R2_Result!="")
                    <td>{{$data->R2_Result}}</td>
                    @else
                    <td></td> 
                    @endif    
                    @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                      <td>{{$empdata->email}}</td> 
                      @endif   
                    @endforeach               
                  </tr>

                  @endforeach
                  @foreach($userdata_r3 as $data)
                  <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->DOB}}</td>
                    @if($data->Round_3!="")
                    <td>3</td>
                    @else
                    <td></td>
                    @endif
                    @if($data->R3_Result!="")
                    <td>{{$data->R3_Result}}</td>
                    @else
                    <td></td> 
                    @endif  
                    @foreach($emp as $empdata)
                      @if($data->Hr_Id == $empdata->id)
                      <td>{{$empdata->email}}</td> 
                      @endif   
                    @endforeach                 
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
