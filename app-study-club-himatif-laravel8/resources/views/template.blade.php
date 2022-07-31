<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('title')">
    <meta name="author" content="<?= Session::get('email') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/himatif.png">
    <title>@yield('title') | Study Club TI Polindra</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="/assets/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="/assets/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <link rel="stylesheet" href="/assets/jquery-ui/css/jquery-ui.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .card {
            background-color: white;
            margin-bottom: 30px;
            border-radius: .5rem;
        }

        .card-img img {
            border-top-left-radius: .5rem;
            border-top-right-radius: .5rem;
            width: 100%;
            height: 242px;
        }

        .card-body {
            padding: 10px;
        }

        .form-control:focus {
            border: 1px solid blue;
        }

        @media (max-width: 767px) {
            .top-left-part {
                width: 200px;
            }
        }
    </style>

    <script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> -->
    <script src="/assets/tinymce/tinymce.min.js"></script>
    
</head>

<body class="fix-header">
    @if (session('message'))
    <?= session('message') ?>
    @endif
    <?php if (Session::get('id_role') == 1) { ?>
        @include('layout.admin')
    <?php } elseif (Session::get('id_role') == 2) { ?>
        @include('layout.lecturer')
    <?php } else { ?>
        @include('layout.student')
    <?php } ?>

    @yield('content')

</div>
</div>
</div>

<div class="modal fade" id="signoutModal" tabindex="-1" aria-labelledby="signoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signoutModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <a href="/logout" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>

<script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<script src="/assets/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<script src="/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="/assets/DataTables/datatables.min.js"></script>
<script src="/assets/js/dashboard1.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

<script src="/assets/moment/moment.js"></script>
<script src="/assets/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="/assets/jquery-ui/js/jquery-ui.js"></script>
<script src="/assets/js/my.js"></script>

</body>

</html>