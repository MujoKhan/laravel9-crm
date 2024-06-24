@include('interviewer.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('interviewer.header')
        @include('interviewer.sidebar')
        @yield('interviewer-content')
    
        @include('interviewer.footer')
    </div> 

</body>

</html>