<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

  <title>Document</title>
</head>
<body>
    <div class="overlay">
      <form method="POST" action="/admin/post_login">
      {{ csrf_field() }}
        <div class="con">
        <header class="head-form">
          <h2>Log In</h2>
          <p>login here using your username and password</p>
        </header>
        <br>
        <div class="field-set">
          <span class="input-item">
           <i class="fa fa-user"></i>
         </span>
        <input class="form-input" id="txt-input" type="email" name="email" placeholder="Email Pengguna" required> 
        <br>
        <span class="input-item">
          <i class="fa fa-key"></i>
        </span>
        <input class="form-input" type="password" placeholder="Kata Sandi" id="pwd"  name="password" required>
        <span>
          <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
        </span>
        <br>
        <button class="log-in"> Log In </button>
      </div>
      <div class="other">
        <button class="btn submits frgt-pass">Forgot Password</button>
        <button class="btn submits sign-up">Sign Up 
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </form>
</div>
<script src="js/style.js"></script>
</body>
</html>


