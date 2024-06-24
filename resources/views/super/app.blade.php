@include('super.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('super.header')
        @include('super.sidebar')
        @yield('super-main-content')
        @yield('super-table-content')
        @yield('super-form-content')
        @include('super.footer')
    </div> 

</body>

</html>