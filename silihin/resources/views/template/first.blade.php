<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Conquerors Team">

    <meta name="keywords" content="Foodcourt">
    <meta name="description" content="">

    <title>Silihin :: </title>


    <link href="/assets/front/css/main.css" rel="stylesheet">

    <link href="/assets/chosen/chosen.min.css" rel="stylesheet" />
    <link href="/assets/pnotify/dist/pnotify-all.css" rel="stylesheet">


    <script src="/assets/front/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/assets/sweetalert/dist/sweetalert.min.js"></script>
    <style>
    html {
        scroll-behavior: smooth;
    }
</style>

</head>

<body>
    <div id="pesan"></div>
    <?php if (Session::get('logged_in')): ?>
        <?php
        $user = DB::table('users')->where('email', Session::get('logged_in')['email'])->first();
        ?>
        <?php if ($user->telepon=='' && $user->alamat==''): ?>
            <script src="/assets/front/js/bootstrap.min.js"></script>
            @include('modal.profile')
            <script>
                $("#profile-modal").modal("show")
            </script>
        <?php endif ?>
    <?php endif ?>
    <?php if (session('message')): ?>
        <?= session('message') ?>
    <?php endif ?>
    <div class="main-wrapper">

        @include('layout.nav')

        <div class="container pt-8 pb-8">

            <div class="row" >
                @include('layout.search')
                <div class="col-sm-9 items-block">
                    <div class="wrapper">
                        <div class="section">
                            <div class="category-title mb-2">Kendaraan</div>
                            <div class="row">
                                <div id="getKendaraan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modal.detail')
        @include('modal.inputpesanan')
        @include('layout.footer')
    </div>

    @include('modal.load')

    <script src="/assets/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/site/js/jquery.validate.min.js"></script>    

    <script src="/assets/front/js/search-box.js"></script>
    <script src="/assets/front/js/bootstrap.offcanvas.js"></script>

    <script type="text/javascript" src="/assets/chosen/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.animate.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.buttons.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.callbacks.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.confirm.js"></script>
    <script type="text/javascript" src="/assets/pnotify/dist/pnotify.desktop.js"></script>

    <script src="/assets/front/js/ResizeSensor.min.js" type="text/javascript"></script>
    <script src="/assets/front/js/theia-sticky-sidebar.min.js" type="text/javascript"></script>
    <script src="/assets/front/js/validate.js" type="text/javascript"></script>
    <script src="/assets/front/js/function.js" type="text/javascript"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });
        });

        function show_popup(type) {
            $("#login-modal").modal('hide');
            $("#register-modal").modal('hide');
            $("#forgot-pwd-modal").modal('hide');

            if (type=='login') {
                $("#login-modal").modal('show');
            } else if (type=='signup') {
                $("#register-modal").modal('show');
            } else if (type=='forgot_pwd') {
                $("#forgot-pwd-modal").modal('show');
            }
        }
    </script>

</body>
</html>
