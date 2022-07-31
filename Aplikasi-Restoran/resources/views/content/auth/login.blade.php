<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/all.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/main.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/template') }}/styles/style-responsive.css">
</head>
<body >
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan">
                <form action="{{ url('/signin') }}" class="form-horizontal" method="POST">
                {{ csrf_field() }}
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                            Login Account </h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="{{ url('/template') }}/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            <h1>
                                Silahkan Login</h1>
                            <br />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Username:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="name" type="text" placeholder="Masukkan Username" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Password:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" name="password" type="password" placeholder="Masukkan Password " class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-success">
                                        Log In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
