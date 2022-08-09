<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.myapp') }} | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('') }}/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/theme/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('') }}/theme/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/theme/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('') }}/theme/plugins/iCheck/square/blue.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login Dahulu</p>

            <form action="{{ url('/login') }}" method="post">
                @if (session('sukses'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Berhasil!</strong> {{ session('sukses') }}.
                            </div>
                        </div>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Maaf!</strong> {{ session('message') }}.
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group has-feedback">
                    @csrf
                    <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        autocomplete="off">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{ url('/reset_password') }}" class="btn btn-danger btn-sm btn-block">
                            <i class="fa fa-key"></i> Lupa Password ?
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-sign-in"></i>
                            Sign In</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- jQuery 3 -->
        <script src="{{ url('') }}/theme/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ url('') }}/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="{{ url('') }}/theme/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
</body>

</html>
