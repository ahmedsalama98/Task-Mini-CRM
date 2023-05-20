<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle', env('APP_NAME'))</title>


    <link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">



    {{-- fontawsome --}}
    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/all.min.css') }}>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->

  <link rel="stylesheet" href={{ asset('dashboard/css/plugin/tempusdominus-bootstrap-4.min.css') }}>
  <!-- iCheck -->

  <link rel="stylesheet" href={{ asset('dashboard/css/plugin/icheck-bootstrap.min.css') }}>
  <!-- JQVMap -->

  <link rel="stylesheet" href={{ asset('dashboard/css/plugin/jqvmap.min.css') }}> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/adminlte.min.css') }}>
    {{-- <link rel="stylesheet" href={{ asset('dashboard/css/plugin/bootstrap.min.css') }}> --}}

    @if (app()->getLocale() === 'ar')
        <link rel="stylesheet" href={{ asset('dashboard/css/plugin/custom.css') }}>
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    @endif
    <!-- overlayScrollbars -->

    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/OverlayScrollbars.min.css') }}>
    {{-- <!-- Daterange picker -->

  <link rel="stylesheet" href={{ asset('dashboard/css/plugin/daterangepicker.css') }}>
  <!-- summernote -->

  <link rel="stylesheet" href={{ asset('dashboard/css/plugin/summernote-bs4.min.css') }}> --}}

    <!-- noty -->

    {{-- <link rel="stylesheet" href={{ asset('dashboard/css/plugin/toastr.min.css') }}> --}}

    <script src={{ asset('dashboard/js/plugin/sweetalert2.all.min.js') }}></script>
    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/sweetalert2.min.css') }}>





    <link rel="stylesheet" href={{ asset('dashboard/css/style.css') }}>


</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">

            <img class="animation__shake" src={{ asset('dashboard/img/llog.png') }} alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->

        @include('layouts.admin._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- /.sidebar-menu -->
        @include('layouts.admin._aside')
        <!-- /.sidebar-menu -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="container-fluid">


                <div class="app-content">
                    @yield('content')
                </div>

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <footer class="main-footer d-print-none">


            <strong>© 2022 | Developed By Ahmed</strong> .
        </footer>
    </div>
    <!-- ./wrapper -->




    <!-- jQuery -->

    <script src={{ asset('dashboard/js/plugin/jquery.min.js') }}></script>
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src={{ asset('dashboard/js/plugin/toastr.min.js') }}></script> --}}

    <script src={{ asset('dashboard/js/plugin/jquery-ui.min.js') }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src={{ asset('dashboard/js/plugin/bootstrap.bundle.min.js') }}></script>

    <script src={{ asset('dashboard/js/plugin/adminlte.js') }}></script>

    <script src={{ asset('dashboard/js/plugin/sweetalert2.min.js') }}></script>


    <script src={{ asset('dashboard/js/plugin/dashboard.js') }}></script>
    <script src={{ asset('dashboard/js/index.js') }}></script>


    @include('partials._session')
    @include('partials._errors')


    @yield('scripts')

</body>

</html>
