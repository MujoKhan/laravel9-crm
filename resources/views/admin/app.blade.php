@include('admin.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')

        @yield('admin-content')

        @include('admin.footer')
    </div> 

</body>

</html>