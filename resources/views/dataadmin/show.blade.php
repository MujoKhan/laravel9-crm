@extends('dataadmin.app')
@section('dataadmin-content')

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Data</h3>
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
                    <th>Assign To HR</th>
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
                    @if($data->Hr_Id != "")
                        @foreach($emp as $data1)
                        @if($data->Hr_Id == $data1->id)
                        <td>{{$data1->email}}</td>
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


@endsection
@section('main-script')

<!-- <script>
  $(document).ready(function(){
    $("button").click(function(){  
        var a = $(this).val();
      // $("#exampleModal_edit").model();
      alert(a);
     });
  });
</script> -->

@endsection