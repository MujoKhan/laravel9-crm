@extends('admin.app')


@section('admin-content')
@if(session()->get('hr') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
           
              <h3 class="card-title">{{ session()->get('empname')}} (HR)</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign" >
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Data Admin</th>
                    <th>Interviewer</th>
                    <th>Result</th>
                    <th>Round</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Data_Admin_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Data_Admin_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->Inter_Id_R1!="")
                       @foreach($allemp as $empdata)
                         @if($data->Inter_Id_R1 == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R1_Result!="")
                    <td>{{$data->R1_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_1!="")
                    <td>1</td>
                    @else
                    <td></td>
                    @endif

                  </tr>
                  @endforeach
                  @foreach($userdata as $data)
                   @if($data->Round_2 == 1)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Data_Admin_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Data_Admin_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->Inter_Id_R2!="")
                       @foreach($allemp as $empdata)
                         @if($data->Inter_Id_R2 == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R2_Result!="")
                    <td>{{$data->R2_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_2!="")
                    <td>2</td>
                    @else
                    <td></td>
                    @endif

                  </tr>
                   @endif
                  @endforeach
                  @foreach($userdata as $data)
                   @if($data->Round_3 == 1)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Data_Admin_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Data_Admin_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->Inter_Id_R3!="")
                       @foreach($allemp as $empdata)
                         @if($data->Inter_Id_R3 == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R3_Result!="")
                    <td>{{$data->R3_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_3!="")
                    <td>3</td>
                    @else
                    <td></td>
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
@elseif(session()->get('intern') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
           
              <h3 class="card-title">{{ session()->get('empname')}} (Inter Viewer)</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover" style="background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
                        linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
                        linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>HR</th>
                    <th>Result</th>
                    <th>Round</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Hr_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Hr_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R1_Result!="")
                    <td>{{$data->R1_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_1!="")
                    <td>1</td>
                    @else
                    <td></td>
                    @endif

                  </tr>
                  @endforeach
                  @foreach($userdata as $data)
                   @if($data->Round_2 == 1)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Hr_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Hr_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R2_Result!="")
                    <td>{{$data->R2_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_2!="")
                    <td>2</td>
                    @else
                    <td></td>
                    @endif

                  </tr>
                   @endif
                  @endforeach
                  @foreach($userdata as $data)
                   @if($data->Round_3 == 1)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Hr_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Hr_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
                    @endif

                    @if($data->R3_Result!="")
                    <td>{{$data->R3_Result}}</td>
                    @else
                    <td></td>
                    @endif
                    
                    @if($data->Round_3!="")
                    <td>3</td>
                    @else
                    <td></td>
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
@elseif(session()->get('dadmin') == 1)
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
           
              <h3 class="card-title">{{ session()->get('empname')}} (Data Admin)</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover" style="background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
                        linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
                        linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>HR</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1;
                  @endphp
                  @foreach($userdata as $data)
                  <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$data->Name}}</td>
                    <td>{{$data->Email}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->Course}}</td>

                    @if($data->Hr_Id!="")
                       @foreach($allemp as $empdata)
                         @if($data->Hr_Id == $empdata->id)
                           <td>{{$empdata->Emp_Email}}</td>
                         @endif
                       @endforeach
                    @else 
                    <td></td>   
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
@section('main-script')


@endsection