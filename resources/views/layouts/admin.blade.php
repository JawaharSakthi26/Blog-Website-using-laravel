<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free-5.15.4-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/DataTables/datatables.css')}}">
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

</head>
<body>
    @include('layouts.include.admin-navbar')
    @include('layouts.include.admin-sidebar')
    @yield('content')
    
    <script src="{{asset('assets/plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/adminlte.min.js')}}"></script>
    <script src="{{asset('assets/plugins/fontawesome-free-5.15.4-web/js/all.min.js')}}""></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/datatables.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#mySummernote').summernote({
                height: 250
            });

            $('.dropdown-toggle').dropdown();
        });
        let table = new DataTable('#myTable');
    </script>
</body>
</html>