@extends('admin.app')


@section('admin-content')

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    @if(session('status') && session('status')!= "")
            <div class="alert alert-warning">
                {{session('status')}}
            </div>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Trashed</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover colorDesign" >
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <td>ID</td>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Restore</th>
                    <th>Delete</th>  
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
                      <td>Trashed</td>
                      <td><a href="{{ route('admin.restore',['id'=>$data->id])}}"><button class="btn btn-success"><i class="fas fa-trash-restore"></i></button></a></td>
                      <td><a href="{{ route('admin.delete',['id'=>$data->id])}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
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