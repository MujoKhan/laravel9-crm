@include('hr.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('hr.header')
        @include('hr.sidebar')
        @yield('hr-content')
        @include('hr.footer')
    </div> 

</body>

</html>