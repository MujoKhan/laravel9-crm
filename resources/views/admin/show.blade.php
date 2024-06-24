@extends('admin.app')


@section('admin-content')

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">EMPLOYEE</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign" >
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Trash</th>
                    <th>Work</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach($emp as $data)
        
                  <tr>
                  <td>{{$i++}}</td>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>
                        <a href="{{ route('admin.edit',['id'=>$data->id,'v'=>'emp'])}}" >
                        <button type="button" class="btn btn-success" id="edit"><i class="fas fa-user-edit"></i></button>
                        </a>   
                    </td>
                    <td><a href="{{ route('admin.trash',['id'=>$data->id])}}"><button
                          class="btn btn-danger"><i class="fas fa-eye-slash"></i></button></a></td>
                    <td><a href="{{ route('admin.work',['id'=>$data->id])}}"><button class="btn btn-warning"><i class="fas fa-eye"></i></button></a></td>
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
    $(document).on('click','#edit',function(){  
        var a = $(this).val();
      // $("#exampleModal_edit").model();
      $("#exampleModal").modal("show");
     });
  });
</script> -->

@endsection