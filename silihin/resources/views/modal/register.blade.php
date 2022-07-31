<div id="register-modal" class="modal fade login-component" role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-block">
          <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
          <div class="login-block-header text-center"><img src="/assets/front/images/food.svg" alt="Register" class="d-icon">Register</div>
          <form action="/auth/register" name="register_form" id="register_form" class="crunch-change" method="post">
            @csrf
            <div class="form-group">
              <input type="text" name="nama_lengkap" value="" id="nama_lengkap" class="form-control form-control-lg" placeholder="Nama Lengkap"  />
            </div>
            <div class="form-group">
              <input type="email" name="email" value="" id="email" class="form-control form-control-lg" placeholder="Email"  />
            </div>
            <div class="form-group">
              <input type="text" name="telepon" value="" id="telepon" class="form-control form-control-lg" placeholder="No. Telepon"  />

            </div>
            <div class="form-group">
              <input type="password" name="password" value="" id="password" class="form-control form-control-lg" placeholder="Password"  />
            </div>
            <div class="form-group">
              <button type="submit" name="register" class="btn btn-primary btn-block "><b>Register</b></button>
            </div>
            <div class="form-group">
              <a href="#" onclick="show_popup('login')" class="sing-link">Login</a>
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