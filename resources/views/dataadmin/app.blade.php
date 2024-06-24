@include('dataadmin.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('dataadmin.header')
        @include('dataadmin.sidebar')
        @yield('dataadmin-content')
        @include('dataadmin.footer')
    </div> 

</body>

</html>