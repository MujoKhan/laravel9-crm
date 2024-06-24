@extends('hr.app')
@section('hr-content')

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
              <table id="example1" class="table table-bordered table-hover table-dark">
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
                    <th>View</th>
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
                        <td>{{$data1->Emp_Email}}</td>
                        @endif
                        @endforeach
                     @else
                     <td></td>
                     @endif   
                    <td><a href=""><button class="btn btn-warning"><i class="fas fa-eye"></i></button></a></td>
                    
                  </tr>
                  @endforeach
                  <!-- Modal -->
                  <div id="a" class="modal">
                   <div class="card mt-3">
                      <div class="card-header bg-primary">
                        Edit
                        <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
                      </div>
                      <div class="card-body">
                        @php
                        $v = "emp";
                        @endphp
                        <form action="" method="post">
                          @csrf
                          <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" value="" name="id" readonly>
                          </div>
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="" name="email" readonly>
                          </div>
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="" name="name">
                            @error('name')
                               <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" value="" name="password">
                            @error('password')
                              <label for="" class="text-danger">{{$message}}</label>
                           @enderror
                          </div>
                          <button class="btn btn-success">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- close modal -->
               
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