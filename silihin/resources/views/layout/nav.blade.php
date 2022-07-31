<?php
use Illuminate\Support\Facades\Session;

?>
<div class="navbar-wrapper">
    <nav class="navbar navbar-static-top ct-navbar-statictop fc-nav-bar navbar-secondary">
        <div class="container">
            <div class="row">
                <div class="ct-logo">
                    <div class="navbar-header ct-toggle2">
                        <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#ct-bootstrap-offcanvas">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>

                        <a class="navbar-brand" href="/"><img class="img-responsive flogo" src="/assets/image/abu2.png"alt="FoodCourt">
                        </a>
                    </div>
                </div>
                <div class="ct-navbar">

                    <div class="navbar-offcanvas navbar-offcanvas-touch navbar-right" id="ct-bootstrap-offcanvas">
                        <ul class="nav navbar-nav ct-list ">
                            <?php
                            if (Session::get('logged_in')) {
                                $user = DB::table('users')->where('email', Session::get('logged_in')['email'])->first();?>
                                <li><a href="/">Dashboard</a></li>
                                <li><a href="/kendaraan">Kendaraan Saya</a></li>
                                <li><a href="/pinjaman">Pinjaman Saya</a></li>
                                <li><a href="/penyewaan">Sewaan Saya</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><img src="{!! ($user->image=='') ? '/assets/front/images/user.png' : '/storage/' . $user->image !!}" class="nav-profile-img" alt="<?= $user->nama_lengkap ?>"> <?= $user->nama_lengkap ?>
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/profile"><i class="pe pe-7s-user"></i> Profil Saya</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/auth/logout"><i class="pe pe-7s-next-2"></i>logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a class="btn btn nav-btn" href="javascript:void(0);" onclick="show_popup('login')">Login</a></li>
                                <li><a class="btn btn nav-btn" href="javascript:void(0);" onclick="show_popup('signup')">Register</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
