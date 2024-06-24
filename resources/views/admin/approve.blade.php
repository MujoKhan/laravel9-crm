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
                <h3 class="card-title">All Emp Here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped colorDesign">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <td>ID</td>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Post</th>
                    <!-- <th>Password</th> -->
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      @php 
                      $i = 0;
                      @endphp
                      @foreach($allemp as $data)
                      @php 
                      $i++;
                      @endphp
                    <tr>
                      <td>{{$i}}</td>  
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->post}}</td>
                      
                      @if($data->permission == "Yes")
                      <td><i class="fas fa-eye text-success"></i></td>
                      <td><a href="{{ route('admin.block',['id'=>$data->id])}}"><button class="btn btn-danger"><i class="fas fa-eye-slash"></i></button></a></td>
                      @else
                      <td><i class="fas fa-eye-slash text-danger"></i></td>
                      <td><a href="{{ route('admin.approval',['id'=>$data->id])}}"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a></td>
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