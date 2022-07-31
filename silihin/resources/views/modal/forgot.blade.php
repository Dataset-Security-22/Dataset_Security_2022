<div id="forgot-pwd-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center"><img src="/assets/front/images/food.svg" alt="Forgot Password" class="d-icon">Lupa Password?</div>
                    <form action="/auth/forgot-password" name="forgot_password_form" id="forgot_password_form" class="crunch-change" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" value="" class="form-control form-control-lg" placeholder="email"  />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="forgot_pwd" class="btn btn-primary btn-block "><b>submit</b></button>
                        </div>
                        <div class="form-group">
                            <a href="#" onclick="show_popup('login')" class="forgot-password-link">login</a>
                            <a href="#" onclick="show_popup('signup')" class="sing-link">sign up</a>
                        </div>
                    </form>
                    <div class="login-with-social">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  