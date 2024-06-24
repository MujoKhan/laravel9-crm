<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
                <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
         <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- jquery modal -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <style>
            .colorDesign{
                background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
                        linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
                        linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);"
            }
        </style>
    </head>
    
<body style="background-image: url('{{ asset('background/crm_images.jpg')}}');" width="100%">
    <div class="row mt-5" style="opacity: 0.8">
        <div class="col-md-4 offset-md-4">
        @if(session('status') && session('status')!= "")
               <div class="alert alert-danger">
                   {{session('status')}}
               </div>
               @endif
            <div class="card">
                <div class="card-header bg-primary">
                    <div>
                        Register Here 
                        <a href="{{ route('user.login')}}"><button class="btn btn-warning float-right" id="btn-login">Login</button></a>
                       
                    </div>
                </div>
               
                <div class="card-body colorDesign" >              
                    <form action="{{ route('user.create')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="">Select Role</label>
                            <select name="emprole" id="" class="form-control">
                                <option value="HR">HR</option>
                                <option value="Inter Viewer">Inter Viewer</option>
                                <option value="Data Admin">Data Admin</option>
                            </select>
                            @error('emprole')
                            <div for="" class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                       <div class="form-group ">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <div for="" class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control"  value="{{old('email')}}">
                            @error('email')
                            <div for="" class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            @error('phone')
                            <div for="" class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div for="" class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="other" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Other
                                    </label>
                                    
                                </div>
                                @error('gender')
                                    <div for="" class="alert alert-danger">{{$message}}</div>
                                    @enderror
                        <button type="submit" class="btn btn-success mt-3">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

</body>
</html>
