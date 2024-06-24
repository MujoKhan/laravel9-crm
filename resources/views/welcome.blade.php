<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
        .colorDesign {
            background: linear-gradient(217deg, rgba(255, 0, 0, .8), rgba(255, 0, 0, 0) 70.71%),
                linear-gradient(127deg, rgba(0, 255, 0, .8), rgba(0, 255, 0, 0) 70.71%),
                linear-gradient(336deg, rgba(0, 0, 255, .8), rgba(0, 0, 255, 0) 70.71%);
            "

        }
    </style>
</head>

<body style="background-image: url('{{ asset('background/crm_images.jpg')}}');">
    <div class="container-fluid mt-5">
        <div class="row" style="opacity: 0.8">
            <div class="col-md-5 offset-md-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        CRM (Customer Relationship Management)
                    </div>
                    <div class="card-body colorDesign">
                        <h6>Customer relationship management is a process in which a business or other organization
                            administers its interactions with customers, typically using data analysis to study large
                            amounts of information.</h6>
                        <h6><b>While the benefits vary by department or industry, six benefits of CRM platforms that
                                affect every user include:</b></h6>
                        <ul>
                            <li>Trustworthy reporting.</li>
                            <li>Dashboards that visually showcase data.</li>
                            <li>Improved messaging with automation.</li>
                            <li>Proactive service.</li>
                            <li>Efficiency enhanced by automation.</li>
                            <li>Simplified collaboration.</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div>
                            <a  href="{{ route('user.login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline"><button class="btn btn-warning  ">Login</button></a>
                                <a href="{{ route('user.register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><button class="btn btn-warning ">Register</button></a>
                        </div>
                    </div>
                    <div class="card-body colorDesign">
                        <h6 class="text-center">Access The Webiste</h6>
                        @if (Route::has('user.login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            
                            <a  href="{{ url('/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                            @else
                            <a  href="{{ route('user.login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline"><img src="{{ asset('background/login.jpg')}}" style="width:45%;"></a>
                            

                            @if (Route::has('register'))
                            <a href="{{ route('user.register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><img src="{{ asset('background/register.jpg')}}" style="width:45%;">
                            </a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="opacity: 0.8">
            <div class="col-md-5 offset-md-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        Feature OF Our Website
                    </div>
                    <div class="card-body colorDesign">

                        <h6>This website provides you some feature!</h6>
                        <ul>
                            <li><span class="text-bold">Super Admin</span> manage all admin.</li>
                            <li><span class="text-bold">Admin</span> manage and allow employees.</li>
                            <li><span class="text-bold">Data Admin</span> will collect data and assign to HR.</li>
                            <li><span class="text-bold">HR</span> will analysis and schedule interview.</li>
                            <li><span class="text-bold">Inter Viewer</span> will take interview.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>