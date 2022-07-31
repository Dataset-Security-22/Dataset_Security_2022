<div id="login-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center">
                        <img src="/assets/front/images/food.svg" alt="Login" class="d-icon">Login
                    </div>
                    <form action="/auth/login" name="login_form" id="login_form" class="form-horizontal" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" value="" id="lemail" class="form-control form-control-lg" placeholder="Email"  />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" id="lpassword" class="form-control form-control-lg" placeholder="Password"  />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary btn-block "><b>Login</b></button>
                        </div>
                        <div class="form-group">
                            <a href="#" onclick="show_popup('signup')" class="sing-link">Sign up</a>
                            <a href="#" onclick="show_popup('forgot_pwd')" class="forgot-password-link ">Forgot password?</a>
                        </div>

                    </form>                 

                    <div class="login-with-social">

                        <span>Or with</span> 
                        <a href="/auth/google"><img src="/assets/front/images/sign-g.svg" alt="" class="sc-icn"></a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>