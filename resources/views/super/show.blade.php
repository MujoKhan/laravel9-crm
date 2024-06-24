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
              <h3 class="card-title">Admins</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign" >
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
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
                    <!-- <td>{{$data->password}}</td> -->
                    
                  </tr>
                  <!-- Modal -->
                  <div id="{{$data->Admin_Key}}" class="modal">
                   <div class="card mt-3">
                      <div class="card-header bg-primary">
                        Edit
                        <a href="#" rel="modal:close" class="float-right"><i class="fas fa-times  text-dark"></i></a>
                      </div>
                      <div class="card-body">
                        @php
                        $v = "admin";
                        @endphp
                        <form action="{{ url('super-update/'.$v)}}" method="post">
                          @csrf
                          <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" value="{{$data->Admin_Id}}" name="id" readonly>
                          </div>
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{$data->Admin_Email}}" name="email" readonly>
                          </div>
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{$data->Admin_Name}}" name="name">
                            @error('name')
                               <label for="" class="text-danger">{{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" value="{{$data->Admin_Password}}" name="password">
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

                  <!--  -->
                  <!-- Modal -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div>Hello</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  <!--  -->
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