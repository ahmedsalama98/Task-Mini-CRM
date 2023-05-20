<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') . ' ' }}Admin Login </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- fontawsome --}}
    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/all.min.css') }}>
    <!-- iCheck -->


    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dashboard/css/plugin/adminlte.min.css') }}>

    @if (app()->getLocale() === 'ar')
        <link rel="stylesheet" href={{ asset('dashboard/css/plugin/custom.css') }}>
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    @endif
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('dashboard/img/llog.png') }}" alt="" class="d-block"
                    style="margin: 20px auto !important ; max-width:100%">
                <a href="" class="h1"><b>{{ config('app.name') }}</b> Admin </a>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <p class="login-box-msg">Sign in to Admin Dashboard</p>

                <form action={{ route('admin.login') }} method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="  {{ __('site.EMAIL') }}" name="email"
                            @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="  {{ __('site.PASSWORD') }}"
                            name="password" @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">


                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    {{ __('site.REMEMBER_ME') }}
                                </label>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('site.LOGIN') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>





            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src={{ asset('dashboard/js/plugin/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('dashboard/js/plugin/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dashboard/js/plugin/adminlte.min.js') }}></script>

</body>

</html>
