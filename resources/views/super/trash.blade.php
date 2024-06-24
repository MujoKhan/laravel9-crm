@extends('super.app')
@section('super-table-content')

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign" >
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Restore</th>
                    <th>Trash</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach($admin as $data)
                  <tr>
                  <td>{{$i++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>Trashed</td>
                    <td>
                    
                      <a href="{{ route('super.restore',['id'=>$data->id])}}">
                        <button type="button" class="btn btn-success" id="edit"
                          value="{{$data->id}}"><i class="fas fa-trash-restore"></i></button>
                        </a>
                    </td>
                    <td><a href="{{ route('super.delete',['id'=>$data->id])}}"><button
                          class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
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