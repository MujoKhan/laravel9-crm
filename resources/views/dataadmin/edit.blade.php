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
              <h3 class="card-title">Edit And Assign To HR</h3>
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
                    <th>HR Email</th>
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
                    @if($data->Hr_Id!="")
                      @foreach($emp as $empdata)
                        @if($data->Hr_Id == $empdata->id)
                        <td>{{$empdata->email}}</td>
                        @endif
                      @endforeach
                    @else
                    <td></td>
                    @endif
                    
                    <td>
          
                          <a href="{{ route('user.dataadmin.edit',['id'=>$data->id, 'v'=>'user edit'])}}">
                        <button type="button" class="btn btn-success" id="edit"
                          value=""><i class="fas fa-user-edit"></i></button></a>
                    </td>
                    <td>
                    <a href="{{ route('user.dataadmin.edit',['id'=>$data->id, 'v'=>'user assign'])}}"><button class="btn btn-warning"><i class="fas fa-handshake"></i></i></button></a>
                      <!-- <a href="#assign{{$data->id}}" rel="modal:open""><button class="btn btn-warning"><i class="fas fa-handshake"></i></i></button></a> -->
                  </td>
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